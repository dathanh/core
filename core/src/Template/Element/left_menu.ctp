<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <!--Start  Profile admin-->
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <!--<img alt="image" class="img-circle" src="img/admin.jpg" />-->
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                            <span class="block m-t-xs"> 
                                <strong class="font-bold">Admin</strong>
                            </span> 
                            <span class="text-muted text-xs block">
                                Super Admin
                                <b class="caret"></b>
                            </span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="profile.html">Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.html">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <!-- End Profile admin-->

            <!--Start Left Menu Item -->

            <?php if (!empty($menuList)): ?>
                <?php foreach ($menuList as $menuSection) : ?>
                    <?php if (!empty($menuSection['label'])): ?>
                        <li class="landing_link">
                            <a>
                                <i class="fa fa-<?= $menuSection['icon'] ?>"></i> 
                                <span class="nav-label"><?= $menuSection['label'] ?></span> 
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($menuSection['subNav'])): ?>
                        <?php foreach ($menuSection['subNav'] as $menuItem) : ?>
                            <li class="<?= $menuItem['class'] ?>">
                                <a href="index-2.html">
                                    <i class="fa fa-<?= $menuItem['icon'] ?>"></i> 
                                    <span class="nav-label"><?= $menuItem['label'] ?></span> 
                                    <span class="fa arrow"></span>
                                </a>
                                <?php if (!empty($menuItem['subNav'])): ?>
                                    <ul class="nav nav-second-level collapse">
                                        <?php foreach ($menuItem['subNav'] as $menuAction) : ?>
                                            <li class="<?= $menuAction['class'] ?>">
                                                <a href="<?= $menuAction['url'] ?>">
                                                    <?= $menuAction['label'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <!--Start Left Menu Item-->
        </ul>

    </div>
</nav>