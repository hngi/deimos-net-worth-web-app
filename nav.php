<

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

<form>
    <li>
        <button type="button"class="m-3 pt-1 pl-3 pr-3 pb-1" name="faq">Hello, <?php echo ucfirst($username);?></button>
    </li>        
</form>

<li class="nav-item">
    <form action="server.php">
        <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" name="logout"> &gt; &gt; &nbsp;Logout</button>
    </form>
</li>