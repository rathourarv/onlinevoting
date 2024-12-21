<div class="container">
    <div>
        <div class="well col-xs-4">
            <h4>Election: <?php echo $election["electionName"]; ?></h4>
        </div>
        <div class="well col-xs-4">
            <h4>Election Type: <?php echo $election["electionType"]; ?></h4>
        </div>
        <div class="well col-xs-4">
            <h4>Result Date: <?php echo $election["endDate"]; ?></h4>
        </div>
    </div>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Index</th>
                <th scope="col">Candidate Name</th>
                <th scope="col">Party Name</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Total Votes</th>
            </tr>
        <tbody>
            <?php foreach($results as $result_id => $result): ?>
                <tr>
                    <td><?php echo htmlspecialchars($result_id + 1); ?></td>
                    <td><?php echo htmlspecialchars($result["candidateName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["constituencyName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["votes"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>