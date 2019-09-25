<?php if($_GET['page']=="info"){?>
    <div class="container">

                       
                        
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Kategori Informasi</h5>
                                    <p><a href="index.php?page=tambah"><span class="fa fa-plus"></span> Tambah</a></p>
                                    <p><a href="index.php?page=hapus"><span class="fa fa-min"></span> Hapus</a></p>
                                </div>
                            </div>
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>ID. Kategori</th>
                                            <th>Kategori Informasi</th>
                                            <th>[Aksi]</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <tr>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td></td>
                                        </tr>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<?php } 
else if($_GET['page']=="tambah"){ ?>
    <div class="app-container">                
                <!-- START SIDEBAR -->
                <div class="app-sidebar app-navigation app-navigation-fixed scroll app-navigation-style-default app-navigation-open-hover dir-left" data-type="close-other">
                    <a href="index.html" class="app-navigation-logo">
                        Boooya - Revolution Admin Template
                        <button class="app-navigation-logo-button mobile-hidden" data-sidepanel-toggle=".app-sidepanel"><span class="icon-alarm"></span> <span class="app-navigation-logo-button-alert">7</span></button>
                    </a>
                    <nav>
                        <ul>
                            <li class="title">MAIN</li>
                            <li><a href="index.html"><span class="icon-laptop-phone"></span> Dashboard</a></li>
                            <li>
                                <a href="#"><span class="icon-files"></span> Pages</a>
                                <ul>                                
                                    <li><a href="pages-faq.html"><span class="icon-question-circle"></span> FAQ</a></li>
                                    <li><a href="pages-gallery.html"><span class="icon-picture3"></span> Gallery</a></li>
                                    <li><a href="pages-help.html"><span class="icon-lifebuoy"></span> Help</a></li>
                                    <li><a href="pages-search.html"><span class="icon-earth"></span> Search Result</a></li>
                                    <li>
                                        <a href="#"><span class="icon-bag-dollar"></span> Bank Application</a>
                                        <ul>                
                                            <li><a href="pages-bank-main.html"><span class="icon-coin-dollar"></span> Main</a></li>
                                            <li><a href="pages-bank-deposits.html"><span class="icon-cash-dollar"></span> Deposits</a></li>
                                            <li><a href="pages-bank-activity.html"><span class="icon-sync"></span> Activity</a></li>
                                            <li><a href="pages-bank-settings.html"><span class="icon-cog"></span> Settings</a></li>
                                            <li><a href="pages-bank-security.html"><span class="icon-shield-check"></span> Security</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-document2"></span> Blog Pages</a>
                                        <ul>                
                                            <li><a href="pages-blog-main.html"><span class="icon-document"></span> Main (Variant 1)</a></li>
                                            <li><a href="pages-blog-main-2.html"><span class="icon-document"></span> Main (Variant 2)</a></li>
                                            <li><a href="pages-blog-category.html"><span class="icon-papers"></span> Category (Right Sidebar)</a></li>
                                            <li><a href="pages-blog-category-2.html"><span class="icon-papers"></span> Category (Left Sidebar)</a></li>
                                            <li><a href="pages-blog-single.html"><span class="icon-document2"></span> Single</a></li>                        
                                        </ul>
                                    </li>
                                    <li><a href="pages-contact-list.html"><span class="icon-group-work"></span> Contact List</a></li>
                                    <li>
                                        <a href="#"><span class="icon-bubble"></span> Messages</a>
                                        <ul>
                                            <li><a href="pages-messages-chat.html"><span class="icon-bubble-dots"></span> Chat</a></li>
                                            <li><a href="pages-messages-list.html"><span class="icon-bubble-user"></span> Messages List</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="pages-lock-screen.html"><span class="icon-lock"></span> Lock Screen</a></li>
                                    <li>
                                        <a href="#"><span class="icon-enter-right"></span> Log In / Sign In</a>
                                        <ul>
                                            <li><a href="pages-login.html"><span class="icon-cli"></span> Log In</a></li>
                                            <li><a href="pages-login-bg.html"><span class="icon-picture3"></span> Log In (Background)</a></li>
                                            <li><a href="pages-signin.html"><span class="icon-user-plus"></span> Sign In</a></li>
                                            <li><a href="pages-signin-bg.html"><span class="icon-calendar-user"></span> Sign In (Background)</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>                
                            <li><a href="documentation.html"><span class="icon-lifebuoy"></span> Documentation</a></li>
                            
                            <li class="title">LAYOUTS</li>                
                            <li>
                                <a href="#"><span class="icon-icons2"></span> Layout Components</a>
                                <ul>
                                    <li>
                                        <a href="#"><span class="icon-border-top"></span> Headers</a>
                                        <ul>                
                                            <li><a href="layouts-header.html"><span class="icon-arrow-up-square"></span> Simple</a></li>
                                            <li><a href="layouts-header-inside.html"><span class="icon-minus-square"></span> Insde Content</a></li>
                                            <li><a href="layouts-header-title.html"><span class="icon-document"></span> With Title</a></li>
                                            <li><a href="layouts-header-navigation.html"><span class="icon-window"></span> Simple Navigation</a></li>
                                            <li><a href="layouts-header-navigation-custom.html"><span class="icon-window"></span> Simple Navigation (Hover Item)</a></li>
                                            <li><a href="layouts-header-navigation-extended.html"><span class="icon-menu"></span> Extended Navigation</a></li>
                                        </ul>
                                    </li>
                                    <li>                                                                
                                        <a href="#"><span class="icon-indent-increase"></span> Sidebars</a>
                                        <ul>
                                            <li><a href="layouts-sidebar-left.html"><span class="icon-chevron-left-square"></span> Left Sidebar</a></li>
                                            <li><a href="layouts-sidebar-right.html"><span class="icon-chevron-right-square"></span> Right Sidebar</a></li>
                                            <li><a href="layouts-sidebar-left-right.html"><span class="icon-menu-square"></span> Left & Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>                                                                
                                        <a href="#"><span class="icon-menu"></span> Navigation</a>
                                        <ul>
                                            <li><a href="layouts-navigation-default.html"><span class="icon-menu-square"></span> Default</a></li>
                                            <li><a href="layouts-navigation-default-fixed.html"><span class="icon-border-style"></span> Default Fixed</a></li>
                                            <li><a href="layouts-navigation-close-other.html"><span class="icon-chevron-down-square"></span> Close Other</a></li>
                                            <li><a href="layouts-navigation-hidden.html"><span class="icon-border-none"></span> Hidden</a></li>
                                            <li><a href="layouts-navigation-minimized.html"><span class="icon-enter-left2"></span> Minimized</a></li>
                                            <li><a href="layouts-navigation-open-hover.html"><span class="icon-fingers-scroll-vertical"></span> Open On Hover</a></li>
                                            <li><a href="layouts-navigation-light.html"><span class="icon-drop2"></span> Custom Theme</a></li>
                                            <li><a href="layouts-navigation-mobile.html"><span class="icon-smartphone"></span> Mobile Style (Simple)</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-menu-square"></span> Content</a>
                                        <ul>
                                            <li><a href="layouts-content-resizable.html"><span class="icon-fingers-scroll-horizontal"></span> Resizable</a></li>
                                            <li><a href="layouts-content-tabbed.html"><span class="icon-new-tab"></span> Tabbed Content</a></li>
                                            <li><a href="layouts-content-tabbed-controls.html"><span class="icon-new-tab"></span> Tabbed Content (Controls)</a></li>                
                                            <li><a href="layouts-content-separated.html"><span class="icon-border-vertical"></span> Separated Content</a></li>                
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-text-wrap"></span> Sidepanels</a>
                                        <ul>
                                            <li><a href="layouts-sidepanel.html"><span class="icon-border-right"></span> Default</a></li>
                                            <li><a href="layouts-sidepanel-overlay.html"><span class="icon-gradient"></span> With Overlay</a></li>
                                        </ul>
                                    </li>  
                                    <li>
                                        <a href="#"><span class="icon-page-break2"></span> Footers</a>
                                        <ul>
                                            <li><a href="layouts-footer-default.html"><span class="icon-border-bottom"></span> Simple</a></li>
                                            <li><a href="layouts-footer-extended.html"><span class="icon-icons2"></span> Extended</a></li>
                                            <li><a href="layouts-footer-custom.html"><span class="icon-drop2"></span> Custom Design</a></li>                
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-transform"></span> Layout Options</a>            
                                <ul>
                                    <li>
                                        <a href="#"><span class="icon-document"></span> Left Navigation</a>                                        
                                        <ul>
                                            <li><a href="layouts-option-basic.html"><span class="icon-document2"></span> Basic</a></li>
                                            <li><a href="layouts-option-basic-header.html"><span class="icon-register"></span> With Header</a></li>
                                            <li><a href="layouts-option-basic-footer.html"><span class="icon-page-break2"></span> With Footer</a></li>
                                            <li><a href="layouts-option-basic-header-footer.html"><span class="icon-document"></span> Header & Footer</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-document"></span> Top Navigation</a>
                                        <ul>
                                            <li><a href="layouts-option-topnav-header.html"><span class="icon-arrow-right-square"></span> Header Navigation</a></li>
                                            <li><a href="layouts-option-topnav-horizontal.html"><span class="icon-check-square"></span> Horizontal Navigation</a></li>
                                            <li><a href="layouts-option-topnav-horizontal-boxed.html"><span class="icon-menu-square"></span> Horizontal Navigation (Boxed)</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-square"></span> Boxed</a>                                        
                                        <ul>
                                            <li><a href="layouts-option-boxed.html"><span class="icon-menu-square"></span> Basic</a></li>
                                            <li><a href="layouts-option-boxed-custom.html"><span class="icon-arrow-down-square"></span> With Margin</a></li>
                                            <li><a href="layouts-option-boxed-content.html"><span class="icon-minus-square"></span> Boxed Content</a></li>
                                        </ul>
                                    </li>
                                </ul>                        
                            </li>
                            
                            <li class="title">COMPONENTS</li>
                            <li>
                                <a href="#"><span class="icon-layers"></span> UI Elements</a>
                                <ul>                                
                                    <li><a href="components-blocks-panels.html"><span class="icon-window"></span> Blocks & Panles</a></li>
                                    <li><a href="components-tabs-accordion.html"><span class="icon-select2"></span> Tabs & Accordions</a></li>
                                    <li><a href="components-alerts-notifications.html"><span class="icon-warning"></span> Alerts & Notifications</a></li>
                                    <li><a href="components-modals-popups.html"><span class="icon-new-tab"></span> Modals & Popups</a></li>
                                    <li><a href="components-dropdowns.html"><span class="icon-menu3"></span> Dropdowns</a></li>
                                    <li><a href="components-buttons.html"><span class="icon-radio-button"></span> Buttons</a></li>                
                                    <li><a href="components-progressbar.html"><span class="icon-align-center-vertical"></span> Progress Bars</a></li>                                
                                    <li><a href="components-pagination.html"><span class="icon-arrow-right-circle"></span> Pagination</a></li>                                
                                    <li><a href="components-spinners.html"><span class="icon-loading"></span> Spinners</a></li>
                                    <li><a href="components-help-classes.html"><span class="icon-lifebuoy"></span> Help Classes</a></li>
                                    <li><a href="components-widgets.html"><span class="icon-pictures"></span> Widgets & Informers</a></li>
                                    <li>
                                        <a href="#"><span class="icon-menu2"></span> Lists</a>
                                        <ul>                
                                            <li><a href="components-lists.html"><span class="icon-list"></span> Basic Lists</a></li>
                                            <li><a href="components-user-contacts.html"><span class="icon-users2"></span> User & Contacts</a></li>
                                            <li><a href="components-tiles.html"><span class="icon-portrait2"></span> Tiles</a></li>
                                            <li><a href="components-news-info.html"><span class="icon-profile"></span> News & Info</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-text-format"></span> Typography</a>
                                        <ul>
                                            <li><a href="components-typography.html"><span class="icon-text-size"></span> Typography</a></li>
                                            <li><a href="components-labels-badges.html"><span class="icon-bookmark2"></span> Labels & Badges</a></li>
                                            <li><a href="components-text-heading.html"><span class="icon-clipboard-text"></span> Text Heading</a></li>
                                            <li><a href="components-heading.html"><span class="icon-menu-square"></span> Page & Block Heading</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-star"></span> Features</a>
                                <ul>                
                                    <li><a href="components-features-gallery.html"><span class="icon-pictures"></span> Compact Gallery</a></li>
                                    <li><a href="components-features-tips.html"><span class="icon-bullhorn"></span> Tips</a></li>
                                    <li><a href="components-features-loading.html"><span class="icon-ellipsis"></span> Loading</a></li>
                                    <li><a href="components-features-statusbar.html"><span class="icon-warning"></span> Status Bar</a></li>
                                    <li><a href="components-features-preview.html"><span class="icon-eye"></span> Preview</a></li>
                                </ul>
                            </li>        
                            <li>
                                <a href="#"><span class="icon-power"></span> Icons</a>
                                <ul>
                                    <li><a href="components-icons-linearicons.html"><span class="icon-diamond2"></span> Linearicons</a></li>
                                    <li><a href="components-icons-fontawesome.html"><span class="icon-leaf"></span> Font Awesome</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-grid"></span> Tables</a>
                                <ul>
                                    <li><a href="components-tables-default.html"><span class="icon-text-align-justify"></span> Default</a></li>
                                    <li><a href="components-tables-sortable.html"><span class="icon-sort-alpha-asc"></span> Sortable</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-chart-growth"></span> Charts</a>
                                <ul>                                
                                    <li><a href="components-charts-morris.html"><span class="icon-graph"></span> Morris Charts</a></li>
                                    <li><a href="components-charts-rickshaw.html"><span class="icon-chart-growth"></span> Rickshaw Charts</a></li>
                                    <li><a href="components-charts-other.html"><span class="icon-signal"></span> Other</a></li>                
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-map"></span> Maps</a>
                                <ul>
                                    <li><a href="components-maps-jvectormap.html"><span class="icon-map-marker"></span> jVectorMap</a></li>
                                    <li><a href="components-maps-google.html"><span class="icon-map-marker-check"></span> Google Maps</a></li>
                                </ul>
                            </li>
                            
                            <li class="title">FORMS</li>
                            <li>
                                <a href="#"><span class="icon-pencil"></span> Form Elements</a>
                                <ul>
                                    <li><a href="forms-elements-basic.html"><span class="icon-menu2"></span> Basic Elements</a></li>
                                    <li><a href="forms-elements-checkbox-radio.html"><span class="icon-check-square"></span> Checkbox, Radio & Switch</a></li>
                                    <li><a href="forms-elements-select-datepicker.html"><span class="icon-calendar-insert"></span> Select & Datepicker</a></li>
                                    <li><a href="forms-elements-valudation-states.html"><span class="icon-clipboard-check"></span> Validation States</a></li>
                                    <li><a href="forms-elements-input-groups.html"><span class="icon-list4"></span> Input Group</a></li>
                                    <li><a href="forms-elements-other.html"><span class="icon-chip"></span> Other</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-shield-check"></span> Validation</a>
                                <ul>
                                    <li><a href="forms-valudation-engine.html"><span class="icon-shield-cross"></span> Validation Engine</a></li>
                                    <li><a href="forms-valudation-helpers.html"><span class="icon-cli"></span> Masked Helpers</a></li>                                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="icon-folder-star"></span> Miscellaneous</a>
                                 <ul>
                                    <li><a href="forms-wysiwyg-editors.html"><span class="icon-pencil4"></span> WYSIWYG Editors</a></li>
                                    <li><a href="forms-code-preview.html"><span class="icon-code"></span> Code Preview</a></li>
                                </ul>
                            </li>
                            <li class="title">RTL</li>
                            <li><a href="rtl.html"><span class="icon-arrow-left"></span> RTL Support</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- END SIDEBAR -->
                
                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                    <div class="app-header">
                        <ul class="app-header-buttons">
                            <li class="visible-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-toggle=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
                            <li class="hidden-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-minimize=".app-sidebar.dir-left"><span class="icon-list4"></span></a></li>
                        </ul>
                        <form class="app-header-search" action="" method="post">        
                            <input type="text" name="keyword" placeholder="Search">
                        </form>    
                    
                        <ul class="app-header-buttons pull-right">
                            <li>
                                <div class="contact contact-rounded contact-bordered contact-lg contact-ps-controls">
                                    <img src="assets/images/users/user_1.jpg" alt="John Doe">
                                    <div class="contact-container">
                                        <a href="#">John Doe</a>
                                        <span>Administrator</span>
                                    </div>
                                    <div class="contact-controls">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-default btn-icon" data-toggle="dropdown"><span class="icon-cog"></span></button>                        
                                            <ul class="dropdown-menu dropdown-left">
                                                <li><a href="#"><span class="icon-cog"></span> Settings</a></li> 
                                                <li><a href="#"><span class="icon-envelope"></span> Messages <span class="label label-danger pull-right">+24</span></a></li>
                                                <li><a href="#"><span class="icon-users"></span> Contacts <span class="label label-default pull-right">76</span></a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><span class="icon-exit-right"></span> Log Out</a></li> 
                                            </ul>
                                        </div>                    
                                    </div>
                                </div>
                            </li>        
                        </ul>
                    </div>
                    <!-- END APP HEADER  -->
                    
                    <!-- START PAGE HEADING -->
                    <div class="app-heading app-heading-bordered app-heading-page">
                        <div class="icon icon-lg">
                            <span class="icon-document2"></span>
                        </div>
                        <div class="title">
                            <h2>Default Elements</h2>
                            <p>Easiest way to make your heading beautiful</p>
                        </div>
                        <!--<div class="heading-elements">
                            <a href="#" class="btn btn-danger" id="page-like"><span class="app-spinner loading"></span> loading...</a>
                        </div>-->
                    </div>
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form Elements</a></li>
                            <li class="active">Default Elements</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Basic Inputs</h2>
                                    <p>Ultra Crisp Line Icons with Integrity</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Input text</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Placeholder</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="placeholder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Predefined value</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="Predefined value">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Readonly</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="Field value" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Disabled</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="Field value" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Textarea</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                        <!-- BASIC SELECT -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Basic Select</h2>
                                    <p>Ultra Crisp Line Icons with Integrity</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Input text</label>
                                    <div class="col-md-10">
                                        <select class="form-control">
                                            <option>Elit senserit intellegat</option>
                                            <option>Mei et ridens voluptua</option>
                                            <option selected>Laboramus voluptatum</option>
                                            <option>Ferri nobis possim</option>
                                            <option>Usu nobis volumus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password</label>
                                    <div class="col-md-10">
                                        <select multiple class="form-control">
                                            <option>Elit senserit intellegat</option>
                                            <option selected>Mei et ridens voluptua</option>
                                            <option>Laboramus voluptatum</option>
                                            <option>Ferri nobis possim</option>
                                            <option>Usu nobis volumus</option>
                                        </select>
                                    </div>
                                </div>                                
                            </form>
                            
                        </div>
                        <!-- END BASIC SELECT -->
                        
                        <!-- BASIC SELECT -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Basic Checkbox & Radio Buttons</h2>
                                    <p>Ultra Crisp Line Icons with Integrity</p>
                                </div>                                
                            </div>                                  
                            
                            <div class="checkbox"> 
                                <label> 
                                    <input type="checkbox" value=""> Option one is this and that—be sure to include why it's great 
                                </label> 
                            </div> 
                            <div class="checkbox disabled"> 
                                <label> 
                                    <input type="checkbox" value="" disabled="disabled"> Option two is disabled 
                                </label> 
                            </div> 
                            <div class="radio"> 
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="checked"> Option one is this and that—be sure to include why it's great 
                                </label> 
                            </div> 
                            <div class="radio"> 
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Option two can be something else and selecting it will deselect option one 
                                </label> 
                            </div> 
                            <div class="radio disabled"> 
                                <label> 
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled="disabled"> Option three is disabled 
                                </label> 
                            </div>                                                         
                        </div>
                        <!-- END BASIC SELECT -->
                        
                        <!-- FILE INPUT -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>File Input</h2>
                                    <p>Default file input and custom</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Default File Input</label>
                                    <div class="col-md-10">
                                        <input type="file" >
                                    </div>
                                </div>                                        
                            </form>
                            
                        </div>
                        <!-- END FILE INPUT -->
                        
                        <!-- HELP BLOCK -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Sizing</h2>
                                    <p>Set heights using classes like <code>.input-lg</code>.</p>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label>Large</label>
                                <input class="form-control input-lg" type="text" placeholder=".input-lg">
                            </div>
                            <div class="form-group">
                                <label>Default</label>
                                <input class="form-control" type="text" placeholder="Default input">
                            </div>
                            <div class="form-group">
                                <label>Small</label>
                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                            </div>                            
                        </div>
                        <!-- END HELP BLOCK -->
                        
                        <!-- HELP BLOCK -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Help Block</h2>
                                    <p>Ultra Crisp Line Icons with Integrity</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Default</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control">
                                        <span class="help-block">Lorem ipsum dolor sit amet</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Text Center</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control">
                                        <span class="help-block text-center">Lorem ipsum dolor sit amet</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Text Right</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control">
                                        <span class="help-block text-right">Lorem ipsum dolor sit amet</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Right</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">                                        
                                    </div>
                                    <label class="col-md-2 control-label help-block">Lorem ipsum dolor sit amet</label>
                                </div>
                            </form>
                            
                        </div>
                        <!-- END HELP BLOCK -->

                        <!-- HELP BLOCK -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Grid</h2>
                                    <p>Mobile ready bootstrap grid system.</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal" role="form">
                                <div class="form-group">                                        
                                    <div class="col-md-12">
                                        <label>.col-md-12</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-md-8">
                                        <label>.col-md-8</label>
                                        <input type="text" class="form-control">
                                    </div>               
                                    <div class="col-md-4">
                                        <label>.col-md-4</label>
                                        <input type="text" class="form-control">
                                    </div>                                                                               
                                </div>       
                                <div class="form-group">                                    
                                    <div class="col-md-6">
                                        <label>.col-md-6</label>
                                        <input type="text" class="form-control">
                                    </div>               
                                    <div class="col-md-3">
                                        <label>.col-md-3</label>
                                        <input type="text" class="form-control">
                                    </div>                                                                               
                                    <div class="col-md-3">
                                        <label>.col-md-3</label>
                                        <input type="text" class="form-control">
                                    </div>                                        
                                </div>                                      
                                <div class="form-group">                                    
                                    <div class="col-md-4">
                                        <label>.col-md-4</label>
                                        <input type="text" class="form-control">
                                    </div>               
                                    <div class="col-md-4">
                                        <label>.col-md-4</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>.col-md-4</label>
                                        <input type="text" class="form-control">
                                    </div>                                                        
                                </div>                                                                                    
                                <div class="form-group">                                    
                                    <div class="col-md-2">
                                        <label>.col-md-2</label>
                                        <input type="text" class="form-control">
                                    </div>                                         
                                    <div class="col-md-5">
                                        <label>.col-md-5</label>
                                        <input type="text" class="form-control">
                                    </div>   
                                    <div class="col-md-5">
                                        <label>.col-md-5</label>
                                        <input type="text" class="form-control">
                                    </div>                                                                                                                                   
                                </div>                                           
                            </form>
                            
                        </div>
                        <!-- END HELP BLOCK -->
                        
                    </div>
                    
                </div>
                <!-- END APP CONTENT -->
                                
            </div>

<?php }?>