<div class="container">
    <?php if (isset($warning)): ?>
        <div class="alert alert-warning">
            <?= $warning ?>
        </div>
    <?php endif; ?>
    <?php if (isset($message)): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <h2>Current Elections</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Election Id</th>
                <th scope="col">Election Name</th>
                <th scope="col">Election Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($current_elections as $electionID => $election): ?>
                <tr>
                    <td><?php echo htmlspecialchars($electionID + 1); ?></td>
                    <td><?php echo htmlspecialchars($election["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionType"]); ?></td>
                    <td><?php echo htmlspecialchars($election["startDate"]); ?></td>
                    <td><?php echo htmlspecialchars($election["endDate"]); ?></td>
                    <td><a href=<?php echo "/vote?election_id={$election['id']}" ?>>Vote</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>