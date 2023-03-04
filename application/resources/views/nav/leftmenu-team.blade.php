<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" id="js-trigger-nav-team">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" id="main-scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" id="main-sidenav">
            <ul id="sidebarnav" data-modular-id="main_menu_team">



                <!--home-->
                @if(auth()->user()->role->role_homepage == 'dashboard')
                <li data-modular-id="main_menu_team_home"
                    class="sidenav-menu-item {{ $page['mainmenu_home'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.home')) }}">
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false" target="_self">
                        <i class="ti-home"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.dashboard')) }}
                        </span>
                    </a>
                </li>
                <!--home-->
                @endif


                <!--users[done]-->
                @if(runtimeGroupMenuVibility([config('visibility.modules.clients'),
                config('visibility.modules.admin')]))
                   <li data-modular-id="main_menu_team_client"
                    class="sidenav-menu-item {{ $page['mainmenu_customers'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.clients')) }}">
                    <a class="waves-effect waves-dark" href="/clients" aria-expanded="false" target="_self">
                        <i class="sl-icon-people"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.clients')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--customers-->

                <!--projects[done]-->
                @if(config('visibility.modules.projects'))
                <li data-modular-id="main_menu_team_projects"
                    class="sidenav-menu-item {{ $page['mainmenu_projects'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-folder"></i>
                        <span class="hide-menu">My {{ cleanLang(__('lang.projects')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if(config('system.settings_projects_categories_main_menu') == 'yes')
                        @foreach(config('projects_categories') as $category)
                        <li class="sidenav-submenu" id="submenu_projects">
                            <a href="{{ _url('/projects?filter_category='.$category->category_id) }}"
                                class="{{ $page['submenu_projects_category_'.$category->category_id] ?? '' }}">{{ $category->category_name }}</a>
                        </li>
                        @endforeach
                        @else
                        <li class="sidenav-submenu {{ $page['submenu_projects'] ?? '' }}" id="submenu_projects">
                            <a href="{{ _url('/projects') }}"
                                class="{{ $page['submenu_projects'] ?? '' }}" style="font-size: 12px;">All Project</a>
                        </li>
					
                        @endif
                        <li class="sidenav-submenu {{ $page['submenu_templates'] ?? '' }}"
                            id="submenu_project_templates" style="display: none;">
                            <a href="{{ _url('/templates/projects') }}"
                                class="{{ $page['submenu_templates'] ?? '' }}">{{ cleanLang(__('lang.templates')) }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--projects-->


                <!--tasks[done]-->
                @if(config('visibility.modules.tasks'))
                <li data-modular-id="main_menu_team_tasks"
                    class="sidenav-menu-item {{ $page['mainmenu_tasks'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.tasks')) }}" style="display: none;">
                    <a class="waves-effect waves-dark" href="/tasks" aria-expanded="false" target="_self">
                        <i class="ti-menu-alt"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.tasks')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--tasks-->

                <!--leads[done]-->
                @if(config('visibility.modules.leads'))
                <li data-modular-id="main_menu_team_leads"
                    class="sidenav-menu-item {{ $page['mainmenu_leads'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.leads')) }}">
                    <a class="waves-effect waves-dark" href="/leads" aria-expanded="false" target="_self">
                        <i class="sl-icon-call-in"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.leads')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--leads-->

                <!--sales-->
                @if(runtimeGroupMenuVibility([config('visibility.modules.invoices'),
                config('visibility.modules.payments'), config('visibility.modules.estimates'),
                config('visibility.modules.products'), config('visibility.modules.expenses'), config('visibility.modules.proposals')]))
                   <li data-modular-id="main_menu_team_billing"
                    class="sidenav-menu-item {{ $page['submenu_invoices'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.invoices')) }}">
                    <a class="waves-effect waves-dark" href="/invoices" aria-expanded="false" target="_self">
                         <i class="ti-wallet"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.invoices')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--billing-->

                <!--affiliates-->
                @if(auth()->user()->is_admin && config('settings.custom_modules.cs_affiliate'))
                <li class="sidenav-menu-item {{ $page['mainmenu_cs_affiliates'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="sl-icon-badge"></i>
                        <span class="hide-menu">@lang('lang.affiliates')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidenav-submenu {{ $page['submenu_templates'] ?? '' }}"
                            id="submenu_cs_affiliate_users">
                            <a href="{{ _url('/cs/affiliates/users') }}"
                                class="{{ $page['submenu_cs_affiliate_users'] ?? '' }}">@lang('lang.users')</a>
                        </li>
                        <li class="sidenav-submenu {{ $page['submenu_templates'] ?? '' }}"
                            id="submenu_cs_affiliate_projects">
                            <a href="{{ _url('/cs/affiliates/projects') }}"
                                class="{{ $page['submenu_cs_affiliate_projects'] ?? '' }}">@lang('lang.projects')</a>
                        </li>
                        <li class="sidenav-submenu {{ $page['submenu_templates'] ?? '' }}"
                            id="submenu_cs_affiliate_earnings">
                            <a href="{{ _url('/cs/affiliates/earnings') }}"
                                class="{{ $page['submenu_cs_affiliate_earnings'] ?? '' }}">@lang('lang.earnings')</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--affiliates-->


                <!--[MODULES] - dynamic menu-->
                {!! config('module_menus.main_menu_team') !!}

                <!--subscriptions-->
                @if(config('visibility.modules.subscriptions'))
                <li data-modular-id="main_menu_team_subscriptions"
                    class="sidenav-menu-item {{ $page['mainmenu_subscription'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.subscriptions')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="/subscriptions" aria-expanded="false"
                        target="_self">
                        <i class="sl-icon-layers"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.subscriptions')) }}
                        </span>
                    </a>
                </li>
                @endif

                <!--spaces-->
                @if(config('visibility.modules.spaces'))
                <li data-modular-id="main_menu_team_spaces hidden"
                    class="sidenav-menu-item {{ $page['mainmenu_spaces'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-layers"></i>
                        <span class="hide-menu">@lang('lang.spaces')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if(config('system.settings2_spaces_user_space_status') == 'enabled')
                        <li class="sidenav-submenu {{ $page['submenu_spaces_my'] ?? '' }}" id="submenu_spaces_my">
                            <a href="{{ _url('/spaces/'.auth()->user()->space_uniqueid) }}"
                                class="{{ $page['submenu_spaces_my'] ?? '' }}">
                                {{ config('system.settings2_spaces_user_space_menu_name') }}
                            </a>
                        </li>
                        @endif
                        @if(config('system.settings2_spaces_team_space_status') == 'enabled')
                        <li class="sidenav-submenu {{ $page['submenu_spaces_team'] ?? '' }}" id="submenu_spaces_team">
                            <a href="{{ _url('/spaces/'.config('system.settings2_spaces_team_space_id')) }}"
                                class="{{ $page['submenu_spaces_team'] ?? '' }}">
                                {{ config('system.settings2_spaces_team_space_menu_name') }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--spaces-->


                <!--tickets-->
                @if(config('visibility.modules.tickets'))
                <li class="sidenav-menu-item {{ $page['mainmenu_tickets'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.tickets')) }}">
                    <a class="waves-effect waves-dark" href="/tickets" aria-expanded="false" target="_self">
                        <i class="ti-comments"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.support')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--tickets-->


                <!--knowledgebase-->
                @if(config('visibility.modules.knowledgebase'))
                <li data-modular-id="main_menu_team_knowledgebase"
                    class="sidenav-menu-item {{ $page['mainmenu_kb'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.knowledgebase')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="/knowledgebase" aria-expanded="false"
                        target="_self">
                        <i class="sl-icon-docs"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.knowledgebase')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--knowledgebase-->

                <!--team-->
                @if(auth()->user()->is_admin)
                 @if(config('visibility.modules.team'))
                  <li data-modular-id="main_menu_team_team"
                    class="sidenav-menu-item {{ $page['mainmenu_team'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="Staff">
                    <a class="waves-effect waves-dark" href="/team" aria-expanded="false" target="_self">
                        <i class="ti-panel"></i>
                        <span class="hide-menu">Staff
                        </span>
                    </a>
                </li>
                 @endif
                        @if(config('visibility.modules.timesheets'))
                   <li data-modular-id="main_menu_team_timesheets"
                    class="sidenav-menu-item {{ $page['mainmenu_timesheets'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.time_sheets')) }}">
                    <a class="waves-effect waves-dark" href="/timesheets" aria-expanded="false" target="_self">
                        <i class="sl-icon-docs"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.time_sheets')) }}
                        </span>
                    </a>
                </li>
                @endif
                    
                @else
                @if(runtimeGroupMenuVibility([config('visibility.modules.team'),
                config('visibility.modules.timesheets')]))
                
                <li data-modular-id="main_menu_team_other"
                    class="sidenav-menu-item {{ $page['mainmenu_settings'] ?? '' }}" style="display:none;">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.other')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="position-top collapse">
                        @if(config('visibility.modules.team'))
                        <li class="sidenav-submenu mainmenu_team {{ $page['submenu_team'] ?? '' }}" id="submenu_team">
                            <a href="/team"
                                class="{{ $page['submenu_team'] ?? '' }}">{{ cleanLang(__('lang.team_members')) }}</a>
                        </li>
                        @endif
                        @if(config('visibility.modules.timesheets'))
                        <li class="sidenav-submenu mainmenu_timesheets {{ $page['submenu_timesheets'] ?? '' }}"
                            id="submenu_timesheets">
                            <a href="/timesheets"
                                class="{{ $page['submenu_timesheets'] ?? '' }}">{{ cleanLang(__('lang.time_sheets')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @endif
                <!--team-->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>