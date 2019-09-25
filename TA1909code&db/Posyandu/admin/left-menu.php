<div class="app-sidebar app-navigation app-navigation-style-default app-navigation-open-hover dir-left" data-type="close-other">
                    <a href="index.html" class="app-navigation-logo">
                        Boooya - Revolution Admin Template 
                        <button class="app-navigation-logo-button mobile-hidden" data-sidepanel-toggle=".app-sidepanel"><span class="icon-alarm"></span> <span class="app-navigation-logo-button-alert">7</span></button>
                    </a>
                    <nav>
                        <ul>
                            <li class="title">MAIN</li>
                            <li><a href="index.php?page=dashboard "><span class="icon-laptop-phone"></span> Dashboard</a></li>
                            <li>
                                <a href="#"><span class="icon-files"></span> Pages</a>
                                <ul>                                
                                    <li><a href="index.php?page=tentang"><span class="icon-question-circle"></span> Tentang</a></li>
                                    <li><a href="index.php?page=kategori-informasi"><span class="icon-picture3"></span>Kategori Informasi</a></li>
                                    <li><a href="index.php?page=informasi"><span class="icon-picture3"></span> Informasi</a></li>
                                    <li><a href="index.php?page=layanan"><span class="icon-lifebuoy"></span> Layanan</a></li>
                                </ul>
                            </li>
                            <?php if($_SESSION['level'] == "Administrator"){ ?>               
                                <li><a href="index.php?page=user"><span class="fa fa-users"></span> User</a></li>
                           <?php } ?>
                        </ul>
                    </nav>
                </div>