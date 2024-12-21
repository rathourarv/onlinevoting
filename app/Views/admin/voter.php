<div class="container">
    <h2>Voters</h2>
    <hr>
    <?php if (isset($validation)): ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <?php if (isset($message)): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?> 
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Dob</th>
                <th scope="col">Address</th>
                <th scope="col">Constituency</th>
                <th scope="col">Aadhar Number</th>
                <th scope="col">Voter Card Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voters as $index => $voter): ?>
                <tr>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $voter["firstName"], $voter["lastName"])); ?></td>
                    <td><?php echo htmlspecialchars($voter["gender"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["dob"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s, %s, %s, %s, %s", $voter["address1"], $voter["address2"], $voter["city"], $voter["state"], $voter["zip"])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($voter["constituencyID"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["aadharNumber"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["voterIDCard"]); ?></td>
                    <td><a href=<?php echo "/profile.php?user_id={$voter['userID']}" ?>>Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>