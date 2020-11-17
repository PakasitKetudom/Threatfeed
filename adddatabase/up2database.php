<html>

<table align="center">
<th style="Font-size:18px;" >Choose data to upload</th>
    <tr>
        <td>
            <form  medthod="post" action="actionup.php" >
            <select name="action" style="height:40px; Font-size:1em; width:200px;">
                <!-- <option value="">Select</option> -->
                <option value="cveven" name="cveven">add to cveven</option>
                <option value="datacve" name="datacve">add to datacve</option>
            </select>
            </form>
         </td>
    </tr>
    <tr>
        <td>
            <input  style="height:40px; width:200px; font-size: 1em;" name="" type="submit" value="Send" onClick="return confirm('Send this ?')" />
        </td>
    </tr>
<table>


</html>