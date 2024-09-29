<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="sstyle.css">
</head>
<body>
    <div class="container">
        <h1>STUDENT REGISTRATION FORM</h1>
        <form id="registrationForm" action="register.php" method="POST">

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" maxlength="30" placeholder="Max 30 characters" required>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" maxlength="30" placeholder="Max 30 characters" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <div class="dob-group">
                    <select name="day" id="day" required>
                        <option value="">Day</option>
                        <script>
                            for (let d = 1; d <= 31; d++) {
                                document.write(`<option value="${d}">${d}</option>`);
                            }
                        </script>
                    </select>

                    <select name="month" id="month" required>
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>

                    <select name="year" id="year" required>
                        <option value="">Year</option>
                        <script>
                            const currentYear = new Date().getFullYear();
                            for (let y = currentYear; y >= 1900; y--) {
                                document.write(`<option value="${y}">${y}</option>`);
                            }
                        </script>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="10 digit number" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="gender-group">
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" maxlength="30" placeholder="Enter your city" required>
            </div>

            <div class="form-group">
                <label for="pin">Pin Code</label>
                <input type="text" id="pin" name="pin" maxlength="6" placeholder="6 digit number" required>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" maxlength="30" placeholder="Enter your state" required>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country" required>
                    <option value="India">India</option>
                    <option value="USA">United States</option>
                    <option value="UK">United Kingdom</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                    <option value="Germany">Germany</option>
                    <option value="France">France</option>
                    <option value="China">China</option>
                    <option value="Japan">Japan</option>
                    <option value="South Korea">South Korea</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Mexico">Mexico</option>
                    <option value="South Africa">South Africa</option>
                </select>
            </div>

            <div class="form-group">
                <label>Hobbies</label>
                <div class="hobbies-group">
                    <input type="checkbox" id="drawing" name="hobbies[]" value="Drawing">
                    <label for="drawing">Drawing</label>
                    <input type="checkbox" id="singing" name="hobbies[]" value="Singing">
                    <label for="singing">Singing</label>
                    <input type="checkbox" id="dancing" name="hobbies[]" value="Dancing">
                    <label for="dancing">Dancing</label>
                    <input type="checkbox" id="sketching" name="hobbies[]" value="Sketching">
                    <label for="sketching">Sketching</label>
                    <input type="checkbox" id="others" name="hobbies[]" value="Others">
                    <label for="others">Others</label>
                </div>
            </div>

            <div class="form-group">
                <label>Qualification</label>
                <table>
                    <tr>
                        <th>Sl.No</th>
                        <th>Examination</th>
                        <th>Board</th>
                        <th>Percentage</th>
                        <th>Year of Passing</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Class X</td>
                        <td><input type="text" name="board1" maxlength="10" required></td>
                        <td><input type="text" name="percentage1" maxlength="5" required></td>
                        <td><input type="text" name="year1" maxlength="4" required></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Class XII</td>
                        <td><input type="text" name="board2" maxlength="10" required></td>
                        <td><input type="text" name="percentage2" maxlength="5" required></td>
                        <td><input type="text" name="year2" maxlength="4" required></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Graduation</td>
                        <td><input type="text" name="board3" maxlength="10" required></td>
                        <td><input type="text" name="percentage3" maxlength="5" required></td>
                        <td><input type="text" name="year3" maxlength="4" required></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Masters</td>
                        <td><input type="text" name="board4" maxlength="10" required></td>
                        <td><input type="text" name="percentage4" maxlength="5" required></td>
                        <td><input type="text" name="year4" maxlength="4" required></td>
                    </tr>
                </table>
            </div>

            <div class="form-group">
                <label>Courses Applied For</label>
                <div class="courses-group">
                    <input type="checkbox" id="bca" name="course[]" value="BCA">
                    <label for="bca">BCA</label>
                    <input type="checkbox" id="bcom" name="course[]" value="B.Com">
                    <label for="bcom">B.Com</label>
                    <input type="checkbox" id="bsc" name="course[]" value="B.Sc">
                    <label for="bsc">B.Sc</label>
                    <input type="checkbox" id="ba" name="course[]" value="BA">
                    <label for="ba">BA</label>
                </div>
            </div>

            <div class="buttons">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
