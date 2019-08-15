<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Google font link -->
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

        <!-- Font Awesome link -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Favicon link -->
        <link rel="shortcut icon" href="#">

        <!-- CSS link -->
        <link rel="stylesheet" href="styles/todo.css">

        <!-- jQuery link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Vue JS link -->
        <script src="https://cdn.jsdelivr.net/npm/vue" defer></script>

        <!-- JS links -->
        <script src="scripts/todo.js" defer></script>
        <script src="scripts/datetime.js" defer></script>

        <title>To Do</title>
    </head>

    <body>

        <main>

            <div class="app_container">

                <nav>

                    <div class="db_status">
                        <?php                  
                            require_once("../private/db.php");
                            getDB_status();
                        ?>  
                    </div>

                    <ul class="navigation">
                        <li onclick="switchTodo()"><i class="fas fa-clipboard-list"></i></li>
                        <li onclick="switchCal()"><i class="fas fa-calendar-alt"></i></li>
                        <li onclick="switchPpl()"><i class="fas fa-cloud-sun-rain"></i></li>
                        <li><a href="index.html"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>

                </nav>

                <section id="todo">

                    <form action="../private/new_todo.php" method="post">
                        <input class="td_input" name="task_name" type="text" placeholder="add new item here" maxlength="60">
                    </form>

                    <span id="settings_button" class="settings_button clicked" onclick="settingsButton()"><i
                            class="fas fa-tools"></i></span>
                    <span id="save_button" class="save_button clicked" onclick="launch()"><i class="fas fa-save"></i></span>


                    <ul id="todo_list" class="todo_list">
<?php
require_once("../private/db.php");
   getData();
?>

                        <!-- <li><input class="td_entry" type="checkbox" /><label>#item1</label><span><i class="fas fa-trash-alt"></i></span></li>
                        <li><input class="td_entry" type="checkbox" /><label>#item2</label><span><i class="fas fa-trash-alt"></i></span></li>
                        <li><input class="td_entry" type="checkbox" /><label>#item3</label><span><i class="fas fa-trash-alt"></i></span></li> -->
                    </ul>
                    

                </section>

                <section id="calendar" class="inactive">

                    <div id="date">
                        {{ message }}
                    </div>

                    <div id="lastmod">
                    <?php
// outputs e.g. 'Last modified: March 04 1998 20:43:59.'
echo "Last modified: " . date ("F d Y H:i:s.", getlastmod());
?>
                    </div>

                </section>

                <section id="people" class="inactive">

                <a id="widget" class="weatherwidget-io" href="https://forecast7.com/en/56d9524d11/riga/" data-label_1="RIGA" data-label_2="WEATHER" data-theme="original" >RIGA WEATHER</a>
<script defer>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
                
                </section>

                <section id="settings_area" class="settings_inactive">

                    <ul class="settings_items">
                        <li class="clicked">
                        <form action="../private/delete_all.php" method="post">
                        <button type="submit">
                        <span><i class="fas fa-ban"></i></span>
                        </button>
                        </form>
                        </li>
                        <li class="clicked" onclick=""><span class="clicked"><i
                                    class="fas fa-backspace"></i></span></li>
                        <li class="clicked" onclick="hideMarked()"><span class="clicked"><i
                                    class="fas fa-eye"></i></span></li>
                        <li class="clicked" onclick="showAll()"><span class="clicked"><i class="far fa-eye"></i></span>
                        </li>
                    </ul>

                </section>

            </div>


        </main>

        

    </body>

</html>
