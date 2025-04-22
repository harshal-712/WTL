<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Employee ID:<input type="text" name="empId" required></td>
            </tr>
            <tr>
                <td>Name:<input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email:<input type="email"  name="email" required></td>
            </tr>
            <tr>
                <td>Mobile No:<input type="number"  name="phone" required></td>
            </tr>
            <tr>
                <td>Department:<input type="text" name="Department" required></td>
            </tr>
            <tr>
                <td>Salary:
                    <input type="number" id="salary" name="salary" required></td>
            </tr>
        </table>
                    <input type="submit" name="b1" value="Add"/>
                    <input type="button" name="b2" value="Update"/>
                    <input type="button" name="b3" value="Delete"/>
                    <input type="button" name="b4" value="Display"/>

    </form>
    <?php
        if (isset($_POST['b1'])) {
            $a=$_POST['empId']
            $b=$_POST['name']
            $c=$_POST['email']
            $d=$_POST['phone']
            $e=$_POST['Department']
            $f=$_POST['salary']
            echo "Record Added Successfully"
        }
        elseif (isset($_POST['b2'])) {
            echo "Record Updated Successfully"
        }
        elseif (isset($_POST['b3'])) {
            echo "Record Deleted Successfully"
        }
        elseif (isset($_POST['b4'])) {
            echo "Record Displayed Successfully"
        }
    ?>
</body>
</html>
