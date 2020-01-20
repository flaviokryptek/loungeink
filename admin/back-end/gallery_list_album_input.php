
<?php 

$query = 'SELECT * FROM album ORDER BY id ASC';
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
if($row['nome'] != 'Todas'){?>
    <li>
        <input type="radio" name="album" required id="<?php echo $row['nome'];?>" value="<?php echo $row['nome']; ?>">
        <label for="<?php echo $row['nome'];?>"><?php echo $row['nome']; ?></label>
    </li>
<?php }} ?>