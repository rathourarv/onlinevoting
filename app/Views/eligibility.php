<div class="container">
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
    <h2>Update Voting Eligibility Details</h2>
    <hr>
    <form method="POST" action=<?php echo "/eligibility" ?>>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                    value=<?php echo $profile['firstName'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                    value=<?php echo $profile['lastName'] ?? "" ?>>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" placeholder="gender" value=<?php echo $profile['gender'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" id="address1" name=address1
                    placeholder="Apartment, studio, or floor" value=<?php echo $profile['address1'] ?? "" ?>>
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" id="address2" name=address2 placeholder="Area" value=<?php echo $profile['address2'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value=<?php echo $profile['city'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select id="state" name="state" class="form-control">
                    <option selected><?php echo $profile['state'] ?? "..." ?></option>
                    <option>Andhra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chhattisgarh</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                    <option>Haryana</option>
                    <option>Himachal Pradesh</option>
                    <option>Jharkhand</option>
                    <option>Karnataka</option>
                    <option>Kerala</option>
                    <option>Madhya Pradesh</option>
                    <option>Maharashtra</option>
                    <option>Manipur</option>
                    <option>Meghalaya</option>
                    <option>Mizoram</option>
                    <option>Nagaland</option>
                    <option>Odisha</option>
                    <option>Punjab</option>
                    <option>Rajasthan</option>
                    <option>Sikkim</option>
                    <option>Tamil Nadu</option>
                    <option>Telangana</option>
                    <option>Tripura</option>
                    <option>Uttarakhand</option>
                    <option>Uttar Pradesh</option>
                    <option>West Bengal</option>
                    <option>Andaman and Nicobar Islands</option>
                    <option>Andaman and Nicobar Islands</option>
                    <option>Dadra and Nagar Haveli and Daman & Diu</option>
                    <option>The Government of NCT of Delhi</option>
                    <option>Jammu & Kashmir</option>
                    <option>Ladakh</option>
                    <option>Puducherry</option>
                    <option>Lakshadweep</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" value=<?php echo $profile['zip'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="date of birth" value=<?php echo $profile['dob'] ?? "" ?> required>
            </div>
            <div class="form-group col-md-6">
                <label for="constituencyID">Constituency ID</label>
                <input type="text" class="form-control" id="constituencyID" name="constituencyID" placeholder="Your Constituency ID" value=<?php echo $profile['constituencyID'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="voterIDCard">Voter ID</label>
                <input type="text" class="form-control" id="voterIDCard" name="voterIDCard" placeholder="Your Voter ID Number"
                    value=<?php echo $profile['voterIDCard'] ?? "" ?>>
            </div>
            <div class="form-group col-md-6">
                <label for="aadharNumber">Aadhar Number</label>
                <input type="text" name="aadharNumber" class="form-control" id="aadharNumber" placeholder="Your Aadhar Card Number"
                    value=<?php echo $profile['aadharNumber'] ?? "" ?>>
            </div>
        </div>
        <button type="submit" class="btn btn-primary update-profile-button">Update Eligibility</button>
    </form>
</div>