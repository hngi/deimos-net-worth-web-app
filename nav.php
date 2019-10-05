<!-- <li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="dashboard.php" style="text-decoration:none!important; color:#fff !important;">Dashboard&nbsp; |</a>
    </span>
</li> -->
<!-- <li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="leaderboard.php" style="text-decoration:none!important; color:#fff !important;">Leaderboard &nbsp; |</a>
    </span>
</li> -->

<form action="dashboard.php" method="GET">
    <li>
        <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1"  name="contact">Dashboard</button>
    </li>
</form>
<form action="leaderboard.php" method="GET">
    <li>
        <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1"  name="contact">Leaderboard</button>
    </li>
</form>
<!-- class="dashboard-header-span" -->


<!-- <li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="contact.php" style="text-decoration:none!important; color:#fff !important;">Contact Us &nbsp; |</a>
    </span>
</li> -->
<form action="contact.php" method="GET">
                        <li>
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1"  name="contact">Contact Us</button>
                        </li>
                    </form>
<form action="faq.php" method="GET">
    <li>
        <button type="submit"class="m-3 pt-1 pl-3 pr-3 pb-1" name="faq">FAQs</button>
    </li>        
</form>

<!-- <li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="faq.php" style="text-decoration:none!important; color:#fff !important;">FAQs&nbsp; |</a>
    </span>
</li> -->
<form>
    <li>
        <button type="button"class="m-3 pt-1 pl-3 pr-3 pb-1" name="faq">Hello, <?php echo ucfirst($username);?></button>
    </li>        
</form>

<!-- <li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; color:#fff !important; ">Hello, <?php echo ucfirst($username);?> &nbsp;</span>  
</li> -->

<!-- <li class="nav-item">
    <form action="contact.php">
        <button type="submit" name="contact"> &nbsp;Contact Us &nbsp;|</button>
    </form>
</li>

<li class="nav-item">
    <form action="faq.php">
        <button   type="submit" name="faq">&nbsp;FAQs&nbsp;|</button>
    </form>
</li> -->
<li class="nav-item">
    <form action="server.php">
        <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" name="logout"> &gt; &gt; &nbsp;Logout</button>
    </form>
</li>