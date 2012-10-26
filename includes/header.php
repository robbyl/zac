<?php
/*
 * 2012 zanhid
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Londo <robbyl@ovi.com>
 *  @copyright  2012 zanhid
 *  @version  Release: 1.0.0
 */
?>
<div class="header">
    <?php date_default_timezone_set('Africa/Dar_es_Salaam'); ?>
    <div class="logo"></div>
    <ul class="user-details">
        <li class="username">Hello,
            <?php
            session_start();
            echo $_SESSION['username'];
            session_commit();
            ?>!
            <div class="user-sub">
                <ul>
                    <li><a href="../../modules/users/my_profile.php">My profile</a></li>
                    <li><a href="../../modules/users/change_password.php">Change password</a></li>
                    <li><a href="../../modules/users/logout.php">Switch user</a></li>
                    <li><a href="../../modules/users/logout.php">Sign out</a></li>
                </ul>
            </div>
        </li>
        <li class="date"><?php echo date('l d M, Y') ?></li>
    </ul>
    <!-- end .header --></div>