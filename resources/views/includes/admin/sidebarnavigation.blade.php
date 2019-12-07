<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
             

                <li class="nav-title">User</li>

                <li class="nav-item">
                <a href="{{route('userDashboard')}}" class="nav-link {{Route::currentRouteName()=='userDashboard' ? 'active':''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item nav-dropdown">
                    <a href="{{route('userComments')}}" class="nav-link {{Route::currentRouteName()=='userComments' ? 'active':''}}">
                        <i class="icon icon-book-open"></i> Comments 
                    </a>
<!--
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="layouts-normal.html" class="nav-link">
                                <i class="icon icon-target"></i> Normal
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="layouts-fixed-sidebar.html" class="nav-link">
                                <i class="icon icon-target"></i> Fixed Sidebar
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="layouts-fixed-header.html" class="nav-link">
                                <i class="icon icon-target"></i> Fixed Header
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="layouts-hidden-sidebar.html" class="nav-link">
                                <i class="icon icon-target"></i> Hidden Sidebar
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a href="#" class="nav-link nav-dropdown-toggle">
                        <i class="icon icon-energy"></i> UI Kits <i class="fa fa-caret-left"></i>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="alerts.html" class="nav-link">
                                <i class="icon icon-energy"></i> Alerts
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="buttons.html" class="nav-link">
                                <i class="icon icon-energy"></i> Buttons
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="cards.html" class="nav-link">
                                <i class="icon icon-energy"></i> Cards
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="modals.html" class="nav-link">
                                <i class="icon icon-energy"></i> Modals
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="tabs.html" class="nav-link">
                                <i class="icon icon-energy"></i> Tabs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="progress-bars.html" class="nav-link">
                                <i class="icon icon-energy"></i> Progress Bars
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="widgets.html" class="nav-link">
                                <i class="icon icon-energy"></i> Widgets
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a href="#" class="nav-link nav-dropdown-toggle">
                        <i class="icon icon-graph"></i> Charts <i class="fa fa-caret-left"></i>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="chartjs.html" class="nav-link">
                                <i class="icon icon-graph"></i> Chart.js
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="forms.html" class="nav-link">
                        <i class="icon icon-puzzle"></i> Forms
                    </a>
                </li>

                <li class="nav-item">
                    <a href="tables.html" class="nav-link">
                        <i class="icon icon-grid"></i> Tables
                    </a>
                </li>
            -->
            @if(Auth::user()->author==true)

                <li class="nav-title">Author</li>

                <li class="nav-item nav-dropdown">
                    <a href="{{route('authorDashboard')}}" class="nav-link {{Route::currentRouteName()=='authorDashboard' ? 'active':''}}">
                        <i class="icon icon-speedometer"></i> Dashboard 
                    </a>
                </li>
                <li class="nav-item nav-dropdown">
                        <a href="{{route('authorPosts')}}" class="nav-link {{Route::currentRouteName()=='authorPosts' ? 'active':''}}">
                            <i class="icon icon-paper-clip"></i> Posts 
                        </a>
                    </li>
                <li class="nav-item nav-dropdown">
                            <a href="{{route('authorComments')}}" class="nav-link {{Route::currentRouteName()=='authorComments' ? 'active':''}}">
                                <i class="icon icon-book-open"></i> Comments 
                            </a>
                 </li>   
                 @endif
                <!--
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="blank.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> Blank Page
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="login.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="register.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> Register
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="invoice.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> Invoice
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="404.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> 404
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="500.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> 500
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="settings.html" class="nav-link">
                                <i class="icon icon-umbrella"></i> Settings
                            </a>
                        </li>
                    </ul>
                -->
               @if(Auth::user()->admin==true)
                <li class="nav-title">Admin</li>
                <li class="nav-item nav-dropdown">
                        <a href="{{route('adminDashboard')}}" class="nav-link {{Route::currentRouteName()=='adminDashboard' ? 'active':''}}">
                            <i class="icon icon-speedometer"></i> Dashboard 
                        </a>
                    </li>
                    <li class="nav-item nav-dropdown">
                            <a href="{{route('adminProducts')}}" class="nav-link {{Route::currentRouteName()=='adminUsers' ? 'active':''}}">
                                <i class="icon icon-basket-loaded"></i> Products
                            </a>
                 </li> 
                    <li class="nav-item nav-dropdown">
                            <a href="{{route('adminPosts')}}" class="nav-link {{Route::currentRouteName()=='adminPosts' ? 'active':''}}">
                                <i class="icon icon-paper-clip"></i> Posts 
                            </a>
                        </li>
                    <li class="nav-item nav-dropdown">
                                <a href="{{route('adminComments')}}" class="nav-link {{Route::currentRouteName()=='adminComments' ? 'active':''}}">
                                    <i class="icon icon-book-open"></i> Comments 
                                </a>
                     </li> 
                     <li class="nav-item nav-dropdown">
                            <a href="{{route('adminUsers')}}" class="nav-link {{Route::currentRouteName()=='adminUsers' ? 'active':''}}">
                                <i class="icon icon-user"></i> Users 
                            </a>
                 </li> 
               
                 @endif
            </ul>
        </nav>
    </div>
