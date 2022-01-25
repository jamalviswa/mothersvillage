<?php
    preg_match('/([a-z]*)@/i', Route::getCurrentRoute()->getActionName(), $matches);
    $controller = $matches[1];
    $action = explode('@', Route::getCurrentRoute()->getActionName())[1];
?>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div 
        id="m_ver_menu" 
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
        >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow " data-controller="">
            <!--<li class="m-menu__item " aria-haspopup="true" >-->
            <!--    <a  href="#" class="m-menu__link ective">-->
            <!--        <i class="m-menu__link-icon flaticon-line-graph"></i>-->
            <!--        <span class="m-menu__link-title">-->
            <!--            <span class="m-menu__link-wrap">-->
            <!--                <span class="m-menu__link-text">-->
            <!--                    Dashboard-->
            <!--                </span>-->
            <!--            </span>-->
            <!--        </span>-->
            <!--    </a>-->
            <!--</li>-->
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('categories.index')}}" class="m-menu__link @if(($controller=='CategoriesController' && $action=='index') || ($controller=='CategoriesController' &&$action=='view') || ($controller=='CategoriesController' &&$action=='edit') || ($controller=='CategoriesController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Customer Details
                            </span>
                        </span>
                    </span>
                </a>
            </li>
           
            
            
           
            
             
           
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>