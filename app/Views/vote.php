<div class="container">
    <?php if (isset($message)): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <h2>Candidates in your Constituency</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Candidate ID</th>
                <th scope="col">Candidate Name</th>
                <th scope="col">Candidate Party Name</th>
                <th scope="col">Your Constituency Name</th>
                <th scope="col">Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidateID => $candidate): ?>
                <tr>
                    <td><?php echo htmlspecialchars($candidateID); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $candidate["firstName"], $candidate["lastName"])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($candidate["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["constituencyName"]); ?></td>
                    <td><a href=<?php echo "/submit?candidate_id={$candidate['id']}&election_id={$candidate['electionID']}" ?>>submit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>