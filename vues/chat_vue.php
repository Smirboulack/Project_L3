<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <?php
                $sql = mysqli_query($connexion, "SELECT * FROM utilisateurs3 WHERE id_u = {$_SESSION['userid']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <img src="images/<?php echo $row['img']; ?>" alt="">
                <div class="details">
                    <span>
                        <?php echo $row['pseudo_u'] ?>
                    </span>
                    <p>
                        <?php echo $row['status']; ?>
                    </p>
                </div>
            </div>
            <a href="index.php?logout=ok" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text" style="color:black;">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
            <?php echo $output; ?>
        </div>
    </section>
</div>