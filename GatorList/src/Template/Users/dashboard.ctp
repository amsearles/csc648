<?php
//echo $this->Form->input('category_id', array('empty'=>'All','options' => $categorys,'style'=> 'width:300px; height:35px'));
$name = "";
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
}

/**
  * @var \App\View\AppView $this
  */

   /*    
 echo $this->Form->create();   
 // You'll need to populate $authors in the template from your controller
    echo $this->Form->input('id');
    // Match the search param in your table configuration
       echo $this->Form->input('q');
       
   $items = $this->Form->control('title');
    echo $this->Form->button('Filter',['type' => 'submit']);
  
 
 echo $this->Form->input('q');
  echo $this->Form->button('Filter', ['type' => 'submit']);
  echo $this->Html->link('Reset', ['action' => '?q=']);
    echo $this->Form->end();
    * 
    */
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <select name="category_id" style="width: 100px;">
                    <option value="" >All</option>
                    <option value="1" >Electronics</option>
                    <option value="3" >Furniture</option>
                    <option value="2" >Books</option>
                    <option value="4" >Apparel</option>
                    
                    </select> </li>
             <li><input size="30" type ="text" name="search" /></li>
             <button type="submit">Search</button>
             
        </form>
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1   ;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: #116d76;
    font-weight: bold;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->username) ?>'s Dashboard</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Time') ?></th>
            <td><?= h($user->create_time) ?></td>
        </tr>
    </table>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Messages')">Messages</button>
        <button class="tablinks" onclick="openCity(event, 'Items')">Items</button>
    </div>

    <div id="Messages" class="tabcontent">
        <h3>Messages</h3>
        <p>No any message yet...</p>
    </div>

    <div id="Items" class="tabcontent">
        <h3>Items</h3>
        <p>Not found any of your item for sale ..</p> 
    </div>

  
    
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($user->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->user_id) ?></td>
                <td><?= h($items->title) ?></td>
                <td><?= h($items->description) ?></td>
                <td><?= h($items->url) ?></td>
                <td><?= h($items->created) ?></td>
                <td><?= h($items->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
 
        <?php if (!empty($message->messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('user_id') ?></th>
                <th scope="col"><?= __('sender_id') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->messages as $messages): ?>
            <tr>
                <td><?= h($messages->recipient_id) ?></td>
                <td><?= h($messages->sender_id) ?></td>
                <td><?= h($messages->message) ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        
    </div>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
