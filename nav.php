<li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="dashboard.php" style="text-decoration:none!important; color:#fff !important;">Dashboard&nbsp; |</a>
    </span>
</li>
<li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
        <a href="leaderboard.php" style="text-decoration:none!important; color:#fff !important;">Leaderboard &nbsp; |</a>
    </span>
</li>
<!-- class="dashboard-header-span" -->
<li class="nav-item">
    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; color:#fff !important; ">Hello, <?php echo ucfirst($username);?> &nbsp;</span>  
</li>
<li class="nav-item">
    <form action="server.php">
        <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" name="logout"> &gt; &gt; &nbsp;Logout</button>
    </form>
</li>