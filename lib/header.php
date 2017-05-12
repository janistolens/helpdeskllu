<?php

    function show_header($auth)
    {
        echo "<nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <ul class='nav navbar-nav'>
                        <li role='presentation'"; nav_bar_handler("/index.php"); echo "><a href='index.php'>Sākums</a></li>
                        <li role='presentation'"; nav_bar_handler("/index.php?new_ticket"); echo "><a href='?new_ticket'>Problēmas reģistrēšana</a></li>
                        <li role='presentation'"; nav_bar_handler("/index.php?my_tickets"); echo "><a href='?my_tickets'>Manas problēmas</a></li>
                    </ul>
                </div>
                    <ul class='nav navbar-nav navbar-right'>
                        <p class='navbar-text'>
                            Sveicināts, 
                            <a href='#' class='navbar-link'>
                            $auth->username
                            </a>
                        </p>
                        <a href='?logout'><button type='button' class='btn btn-default navbar-btn'>Atslēgties</button></a>
                        <br>
                    </ul>
            </div>
        </nav>";
    }

    function nav_bar_handler($url)
    {
        if($_SERVER['REQUEST_URI']===$url)
        {
            echo "class = 'active'";
        }
    }

    function show_admin_header($auth)
    {
        echo "<nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <ul class='nav navbar-nav'>
                        <li role='presentation'"; nav_bar_handler("/admin_area/admin_home.php"); echo "><a href='admin_home.php'>Sākums</a></li>
                        <li role='presentation'"; nav_bar_handler("/admin_area/all_tickets.php"); echo "><a href='all_tickets.php'>Visas Problēmas</a></li>
                    </ul>
                </div>
                    <ul class='nav navbar-nav navbar-right'>
                        <p class='navbar-text'>
                            Sveicināts, 
                            <a href='#' class='navbar-link'>
                            $auth->username
                            </a>
                        </p>
                        <a href='?logout'><button type='button' class='btn btn-default navbar-btn'>Atslēgties</button></a>
                        <br>
                    </ul>
            </div>
        </nav>";
    }