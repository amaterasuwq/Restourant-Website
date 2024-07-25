<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restorant web site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles\compiled-css\general-style.css">
    <link rel="stylesheet" href="../styles\compiled-css\header.css">
    <link rel="stylesheet" href="../styles\compiled-css\home-page.css">
    <link rel="stylesheet" href="../styles\compiled-css\login-register.css">
    <link rel="stylesheet" href="../styles\compiled-css\change-password.css">
    <link rel="stylesheet" href="../styles\compiled-css\reservation-form.css">
    <link rel="stylesheet" href="../styles\compiled-css\feedback-form.css">
    <link rel="stylesheet" href="../styles\compiled-css\contact-us.css">
    <link rel="stylesheet" href="../styles\compiled-css\privacy-policy.css">
    <link rel="stylesheet" href="../styles\compiled-css\menu.css">
    <link rel="stylesheet" href="../styles\compiled-css\add-delete-menu-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="../images/icons/logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="header__container">
        <div class="header__logo-text__row">
            <img src="../images\icons\logo.png" alt="logo">
            <p>Urban Harvest House</p>
        </div>

        <header class="mobile-navigation__burger" id="mobile-navigation__section">
            <i class="fa-solid fa-bars icon"></i>
            <div class="mobile-navigation__drop-down">
				<div class="mobile-navigation__drop-down__title">
					<p>Urban Harvest House</p>
				</div>
                <div class="mobile-navigation__drop-down__logo">
                    <img src="../images/icons/logo.png" alt="logo">
                </div>
                <div class="mobile-navigation__drop-down__navbar">
                    <div class="mobile-navigation__drop-down__navbar__component">
                        <a href="home-page.php">Home</a>
                    </div>

                    <div class="mobile-navigation__drop-down__navbar__component">
                        <a href="menu.php">Menu</a>
                    </div>

                    <div class="mobile-navigation__drop-down__navbar__component">
                        <a href="contact-us.php">Contact Us</a>
                    </div>

                <?php 
    			$navigationComponent__end = "</a>";

				if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
					$navigationComponent__start = "<a href=\"login.php\">Log in";
					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "</div>";
				}
				else {
					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"add_menu_item.php\">Add dish";
					echo " $navigationComponent__start$navigationComponent__end ";  
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"delete_menu_item.php?\">Delete Dish";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"reservation-form.php\">Make reservation";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"feedback-form.php\">Give feedback";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"view_reservations.php\">View reservations";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"privacy-policy.php\">Privacy Policy";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"change-password.php\">Change Password";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";

					echo "<div class='mobile-navigation__drop-down__navbar__component'>";
					$navigationComponent__start = "<a href=\"logout.php?logout\">Log out";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "  </div>";
				}
				?>
                </div>
                <div class="mobile-navigation__drop-down__exit">
					<i class="fa-solid fa-xmark" onclick="this.parentElement.style.display='none';"></i>
                </div>
            </div>
        </header>

        <div class="navigation__container">
            <div class="navigation">
                <a href="home-page.php">Home</a>
                <a href="menu.php">Menu</a>
                <a href="contact-us.php">Contact Us</a>
            </div>

            <?php 
    			$navigationComponent__end = "</a>";

				if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
					$navigationComponent__start = "<a href=\"login.php\">Log in";

					echo "<div class='login-menu__position'>";
					echo " $navigationComponent__start$navigationComponent__end ";
					echo "</div>";
				}

				else {
					echo "<nav class='navigation__drop-down' role='navigation'>";
   					echo "<div id='menuToggle'>";
					echo "<input type='checkbox'/>";
					echo "<span></span>";
					echo "<span></span>";
					echo "<span></span>";
					echo "<ul id=\"menu\">";

					$navigationComponent__start = "<a href=\"add_menu_item.php\">Add dish";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"delete_menu_item.php?\">Delete Dish";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"reservation-form.php\">Make reservation";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"feedback-form.php\">Give feedback";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"view_reservations.php\">View reservations";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"privacy-policy.php\">Privacy Policy";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"change-password.php\">Change Password";
					echo " $navigationComponent__start$navigationComponent__end ";

					$navigationComponent__start = "<a href=\"logout.php?logout\">Log out";
					echo " $navigationComponent__start$navigationComponent__end ";

					echo "</ul>";
					echo "</div>";
					echo "</nav>";
				}
			?>
        </div>
    </div>