<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('master_data_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/machines*") ? "menu-open" : "" }} {{ request()->is("admin/spareparts*") ? "menu-open" : "" }} {{ request()->is("admin/category-blogs*") ? "menu-open" : "" }} {{ request()->is("admin/category-products*") ? "menu-open" : "" }} {{ request()->is("admin/category-contents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/machines*") ? "active" : "" }} {{ request()->is("admin/spareparts*") ? "active" : "" }} {{ request()->is("admin/category-blogs*") ? "active" : "" }} {{ request()->is("admin/category-products*") ? "active" : "" }} {{ request()->is("admin/category-contents*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-database">

                            </i>
                            <p>
                                {{ trans('cruds.masterData.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("admin.machines.index") }}" class="nav-link {{ request()->is("admin/machines") || request()->is("admin/machines/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-industry">

                                    </i>
                                    <p>
                                        Machines
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.spareparts.index") }}" class="nav-link {{ request()->is("admin/spareparts") || request()->is("admin/spareparts/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-check-double">

                                    </i>
                                    <p>
                                        Sparepart
                                    </p>
                                </a>
                            </li>
                            {{-- @can('company_profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.company-profiles.index") }}" class="nav-link {{ request()->is("admin/company-profiles") || request()->is("admin/company-profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.companyProfile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('header_description_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.header-descriptions.index") }}" class="nav-link {{ request()->is("admin/header-descriptions") || request()->is("admin/header-descriptions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-heading">

                                        </i>
                                        <p>
                                            {{ trans('cruds.headerDescription.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('category_blog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.category-blogs.index") }}" class="nav-link {{ request()->is("admin/category-blogs") || request()->is("admin/category-blogs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.categoryBlog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('category_product_access')
                                <!-- <li class="nav-item">
                                    <a href="{{ route("admin.category-products.index") }}" class="nav-link {{ request()->is("admin/category-products") || request()->is("admin/category-products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-bandcamp">

                                        </i>
                                        <p>
                                            {{ trans('cruds.categoryProduct.title') }}
                                        </p>
                                    </a>
                                </li> -->
                            @endcan
                            @can('category_content_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.category-contents.index") }}" class="nav-link {{ request()->is("admin/category-contents") || request()->is("admin/category-contents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th">

                                        </i>
                                        <p>
                                            {{ trans('cruds.categoryContent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                        </ul>
                    </li>
                @endcan
                @can('content_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/sliders*") ? "menu-open" : "" }} {{ request()->is("admin/abouts*") ? "menu-open" : "" }} {{ request()->is("admin/counters*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }} {{ request()->is("admin/blogs*") ? "menu-open" : "" }} {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/other-contents*") ? "menu-open" : "" }} {{ request()->is("admin/testimonials*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/sliders*") ? "active" : "" }} {{ request()->is("admin/abouts*") ? "active" : "" }} {{ request()->is("admin/counters*") ? "active" : "" }} {{ request()->is("admin/teams*") ? "active" : "" }} {{ request()->is("admin/blogs*") ? "active" : "" }} {{ request()->is("admin/products*") ? "active" : "" }} {{ request()->is("admin/other-contents*") ? "active" : "" }} {{ request()->is("admin/testimonials*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fab fa-first-order">

                            </i>
                            <p>
                                {{ trans('cruds.content.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-image">

                                    </i>
                                    <p>
                                        Sliders
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.abouts.index") }}" class="nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-font">

                                    </i>
                                    <p>
                                        Abouts
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.counters.index") }}" class="nav-link {{ request()->is("admin/counters") || request()->is("admin/counters/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-list">

                                    </i>
                                    <p>
                                        Counters
                                    </p>
                                </a>
                            </li>
                            {{-- @can('service_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-concierge-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.service.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_partner_access')
                                <!-- <li class="nav-item">
                                    <a href="{{ route("admin.client-partners.index") }}" class="nav-link {{ request()->is("admin/client-partners") || request()->is("admin/client-partners/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hands-helping">

                                        </i>
                                        <p>
                                            {{ trans('cruds.clientPartner.title') }}
                                        </p>
                                    </a>
                                </li> -->
                            @endcan
                            @can('portfolio_access')
                                <!-- <li class="nav-item">
                                    <a href="{{ route("admin.portfolios.index") }}" class="nav-link {{ request()->is("admin/portfolios") || request()->is("admin/portfolios/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.portfolio.title') }}
                                        </p>
                                    </a>
                                </li> -->
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-teamspeak">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }} / Teacher
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('blog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blogs.index") }}" class="nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-blogger-b">

                                        </i>
                                        <p>
                                            {{ trans('cruds.blog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <!-- <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-product-hunt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li> -->
                            @endcan
                            @can('other_content_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.other-contents.index") }}" class="nav-link {{ request()->is("admin/other-contents") || request()->is("admin/other-contents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-atlas">

                                        </i>
                                        <p>
                                            {{ trans('cruds.otherContent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('testimonial_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.testimonials.index") }}" class="nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-vials">

                                        </i>
                                        <p>
                                            {{ trans('cruds.testimonial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                        </ul>
                    </li>
                @endcan
                @can('inbox_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.inboxes.index") }}" class="nav-link {{ request()->is("admin/inboxes") || request()->is("admin/inboxes/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-inbox">

                            </i>
                            <p>
                                {{ trans('cruds.inbox.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>