<?php
    preg_match('/([a-z]*)@/i', Route::getCurrentRoute()->getActionName(), $matches);
    $controller = $matches[1];
    $action = explode('@', Route::getCurrentRoute()->getActionName())[1];
?>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark">
    <!-- BEGIN: Aside Menu -->
    <div 
        id="m_ver_menu" 
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow " data-controller="">
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                <a href="" class="m-menu__link @if(($controller=='CustomersController' && $action=='personal_index') || 
                    ($controller=='CustomersController' && $action=='personal_view') || 
                    ($controller=='CustomersController' && $action=='personal_edit') || 
                    ($controller=='CustomersController' && $action=='personal_add') )   active @endif m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Customer Details
                            </span>
                        </span>
                    </span>
                </a>
                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--pull">
                    <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('customers.personal_index')}}" class="m-menu__link @if(($controller=='CustomersController' && $action=='personal_index') || 
                                    ($controller=='CustomersController' && $action=='personal_view') || 
                                    ($controller=='CustomersController' && $action=='personal_edit') || 
                                    ($controller=='CustomersController' && $action=='personal_add') )  active @endif">
                                    <i class="m-menu__link-icon flaticon-users"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                Personal Details
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('customers.official_index')}}" class="m-menu__link @if(($controller=='CustomersController' && $action=='official_index') || 
                                    ($controller=='CustomersController' && $action=='official_view') || 
                                    ($controller=='CustomersController' && $action=='official_edit') || 
                                    ($controller=='CustomersController' && $action=='official_add') )  active @endif">
                                    <i class="m-menu__link-icon flaticon-users"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                Official Details
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>                 
                        </ul>
                </div>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('payments.add')}}" class="m-menu__link @if(($controller=='PaymentsController' && $action=='index') || 
                    ($controller=='PaymentsController' &&$action=='view') || 
                    ($controller=='PaymentsController' &&$action=='edit') || 
                    ($controller=='PaymentsController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-file"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                PAYMENT DETAILS
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('blocks.index')}}" class="m-menu__link @if(($controller=='BlocksController' && $action=='index') || 
                    ($controller=='BlocksController' &&$action=='view') || 
                    ($controller=='BlocksController' &&$action=='edit') || 
                    ($controller=='BlocksController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-file"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                BLOCK DETAILS
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a href="<?php echo url('/adminusers/logout'); ?>" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-logout"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                LOGOUT
                            </span>
                        </span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<style>
    .m-aside-left.m-aside-left--skin-dark {
        background-color: #4AB0CF !important;
    }
</style>