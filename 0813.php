<!--   https://stackoverflow.com/questions/20128653/dynamic-bootstrap-tabs-using-php-mysql/20132157   -->
<!-- START OF YOUR CODE -->
    <ul class="nav nav-tabs" id="lb-tabs">
    <?php
    // I just made an array with some data, since I don't have your data source
        $sqlCat =   array(
                        array('tab_title'=>'Home'),
                        array('tab_title'=>'Profile'),
                        array('tab_title'=>'Messages'),
                        array('tab_title'=>'Settings')
                    );

        //set the current tab to be the first one in the list.... or whatever one you specify
        $current_tab = $sqlCat[0]['tab_title'];
    ?>
    <?php
    foreach ($sqlCat as $row):
        //set the class to "active" for the active tab.
        $tab_class = ($row['tab_title']==$current_tab) ? 'active' : '' ;
        echo '<li class="'.$tab_class.'"><a href="#' . urlencode($row['tab_title']) .  '" data-toggle="tab">' .
        $row['tab_title'] .  ' </a></li>';
    endforeach;
    ?>
    </ul><!-- /nav-tabs -->
    <div class="tab-content">
        <?php foreach ($sqlCat as $row2):
        $tab = $row2['tab_title'];
        //set the class to "active" for the active content.
        $content_class = ($tab==$current_tab) ? 'active' : '' ;
        ?>
        <div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; //--  this right here is from yoru code, but there was no "echo" ?>">
            <div class="links">
                <ul class="col">
                    <?php
                    // Again, I just made an array with some data, since I don't have your data source
                    $items = array(
                                array('title'=>'Home','tab_link'=>'http://home.com'),
                                array('title'=>'Profile','tab_link'=>'http://profile.com'),
                                array('title'=>'Messages','tab_link'=>'http://messages.com'),
                                array('title'=>'Settings','tab_link'=>'http://settings.com'),
                                array('title'=>'Profile','tab_link'=>'http://profile2.com'),
                                array('title'=>'Profile','tab_link'=>'http://profile3.com'),
                            );
                    // you have a while loop here, my array doesn't have a "fetch" method, so I use a foreach loop here
                    foreach($items as $item) {
              //output the links with the title that matches this content's tab.
              if($item['title'] == $tab){
                            echo '<li>' . $item['title'] . ' - '. $item['tab_link'] .'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div><!-- /tab-pane  -->
    <?php endforeach; ?>
    </div><!-- /tab-content  -->

<!-- END OF YOUR CODE -->