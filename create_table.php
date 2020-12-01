<?php
include('connect.php');

$table1="create table if not exists transact(
transaction_id int primary key AUTO_INCREMENT,
sender_name varchar(40) not null,
reciever_name varchar(40) not null,
amount bigint NOT NULL
);";
if ($connect->query($table1) === TRUE) {
  echo "Table customer created successfully";
} else {
  echo "Error creating table: " . $connect->error;
}


$connect->close();
?>

<!-- 
"create table if not exists customer (
customer_id  int PRIMARY KEY,
name varchar(40) NOT NULL,
email_id varchar(80) NOT NULL, 
balance bigint NOT NULL
);" -->