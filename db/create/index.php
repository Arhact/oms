<?php
print('<link rel="stylesheet" type="text/css" href="../customize/sty1e.css">');
print('<div class="nav"><a href="../">back</a></div>');

function init() {
  $db = [
    'host'=>'localhost',
    'user'=>'root',
    'password'=>'',
    'name'=>'oms',
  ];

  try {
      $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);
      $query = "DROP DATABASE `oms`";
      mysqli_query($link, $query);
  } catch (\Throwable $th) {
      //throw $th;
  }

  try {
      $link = mysqli_connect($db['host'], $db['user'], $db['password']);
      
      $query = "CREATE DATABASE `oms` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;";
      mysqli_query($link, $query);

      $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);
      
      $query = "CREATE TABLE `Good` (
          `id` int NOT NULL,
          `code` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
          `name` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
      mysqli_query($link, $query);
      
      $query = "CREATE TABLE `Order` (
          `id` int NOT NULL,
          `id_user` int NOT NULL,
          `id_good` int NOT NULL,
          `datetime` datetime NOT NULL,
          `price` int NOT NULL,
          `qt` int NOT NULL,
          `status` tinyint(1) NOT NULL DEFAULT '0'
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
      mysqli_query($link, $query);
      
      $query = "CREATE TABLE `Organization` (
          `id` int NOT NULL,
          `name` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
      mysqli_query($link, $query);
      
      $query = "CREATE TABLE `Price` (
          `id` int NOT NULL,
          `id_good` int NOT NULL,
          `retail` int NOT NULL,
          `wholesale` int NOT NULL,
          `qt` int NOT NULL,
          `datetime` datetime NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
      mysqli_query($link, $query);
      
      $query = "CREATE TABLE `User` (
          `id` int NOT NULL,
          `id_organization` int NOT NULL,
          `login` varchar(50) NOT NULL,
          `password` varchar(255) NOT NULL,
          `name` varchar(50) NOT NULL,
          `phone` varchar(12) NOT NULL,
          `squad` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Guest',
          `status` tinyint(1) NOT NULL DEFAULT '0',
          `email` varchar(200) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
      mysqli_query($link, $query);
      
      $query = "ALTER TABLE `Good`
      ADD PRIMARY KEY (`id`);";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Order`
      ADD PRIMARY KEY (`id`),
      ADD KEY `id_good` (`id_good`),
      ADD KEY `id_user` (`id_user`);";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Organization`
      ADD PRIMARY KEY (`id`);";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Price`
      ADD PRIMARY KEY (`id`),
      ADD KEY `id_good` (`id_good`);";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `User`
      ADD PRIMARY KEY (`id`),
      ADD KEY `id_organization` (`id_organization`);";
      mysqli_query($link, $query);
      
      $query = "ALTER TABLE `Good`
      MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Order`
      MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Organization`
        MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Price`
        MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `User`
      MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
      mysqli_query($link, $query);
      
      $query = "ALTER TABLE `Order`
      ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_good`) REFERENCES `Good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `Price`
      ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_good`) REFERENCES `Good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
      mysqli_query($link, $query);
      $query = "ALTER TABLE `User`
      ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_organization`) REFERENCES `Organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
      mysqli_query($link, $query);
      
      // system('mysql -u '.$db['user'].' -p '.$db['password'].' '.$db['name'].' < oms.sql');

      echo '<br>Its done? i think...';
  } catch (\Throwable $th) {

      echo '<br>Nope. Request error, here we go again<br>'.$th;
  }
}

init();
// header("Location: ../fill");