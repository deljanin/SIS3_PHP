<?php session_start();
include '../header.php';
include '../seasson.php';
include '../components/playerNavbar.component.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matchID = $_POST['match'];
}
?>
<div class="wrapper">
    
    <label>Every time a point is scored input it's action here:</label>
    <?php echo 'Match id: ' . $matchID; ?>
    <form action='../registration/register_actions.php' method='post'>
        <label>Action</label>
        <select name="action_name">
            <option value="serve ace">Serve Ace</option>
            <option value="serve double fault">Double Fault</option>
            <option value="1st serve">1st Serve</option>
            <option value="2nd serve">2nd Serve</option>
            <option value="break point saved">Break Point Saved</option>

            <option value="return ace">Return Ace</option>
            <option value="return double fault">Return Double Fault</option>
            <option value="1st serve return">1st Serve Return</option>
            <option value="2nd serve return">2nd Serve Return</option>
            <option value="break point">Break Point</option>
        </select>
        <label>Time of action: </label>
        <input name="action_time"type="datetime-local"
            id="timeEnd"  value="00:00"
            min="00:00" max="23:59" class="form-control" required>
        <div class="form-check">
            <label class="form-check-label" for="flexCheckDefault">Point Won</label>
            <input class="form-check-input" type="checkbox" name="pointWon" value="true" id="flexCheckDefault">
        </div>
        <div class="form-group mt-2 mb-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <?php echo "<input type='hidden' value='$matchID' name='matchID'/>"; ?>
    </form>
</div>

</body>
</html>