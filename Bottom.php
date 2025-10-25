<form method="post" id="LoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>UserName</label>
                            <span id='lblLoginUsername'></span>
                            <input type="text" oninput="this.value = this.value.toUpperCase()" id='txtLoginUsername' name='txtLoginUsername' class="form-control" placeholder="UserName">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <span id='lblLoginPasswd'></span>
                            <input type="password" id='txtLoginPasswd' name='txtLoginPasswd' class="form-control" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='btnLogin' name='btnLogin' style='width: 150px' class="btn btn-primary">Sign-In</button>
                <button type="button" class="btn btn-primary" style='width: 150px; background-color: red;' data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

<?php
    if (isset($_POST["btnLogin"]))
    {
        $Username = $_POST["txtLoginUsername"];
        $Passwd = $_POST["txtLoginPasswd"];

        $Query = "Select * from internmaster where UserName='$Username' and Password='$Passwd'";
        $res = mysqli_query($Con, $Query);
        if ($row = mysqli_fetch_assoc($res))
        {

            $_SESSION["InternId"] = $row["InternId"];
            $_SESSION["FullName"] = $row["FullName"];
?>
            <script>
                window.location.href = "index.php";
            </script>
<?php
        }
        else
        {
?>
        <script>
            alert("Wrong Username or Password");
        </script>
<?php
        }
    }
?>

<script>
    $(document).ready(function(){
        $("#btnLogin").click(function(){
            var Cnt  = 0;
            Cnt = IsEmpty("txtLoginUsername", "lblLoginUsername", Cnt);
            Cnt = IsEmpty("txtLoginPasswd", "lblLoginPasswd", Cnt);

            if (Cnt == 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        });

        
    });
</script>

<!-- ================= footer start ========================= -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p>Created by Lakdawala Uzair & Shaikh Uzair</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div><a href="#" class="scrollup">Scroll</a></div>

<!-- Jquery js-->
<script src="Content/assets/js/jquery.min.js"></script>
<script src="Content/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="Content/assets/plugins/bootstrap/js/bootsnav.js"></script>
<script src="Content/assets/js/viewportchecker.js"></script>
<script src="Content/assets/js/slick.js"></script>
<script src="Content/assets/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
<script src="Content/assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
<script src="Content/assets/plugins/aos-master/aos.js"></script>
<script src="Content/assets/js/custom.js"></script>
<script>
$(window).load(function() {
    $(".page_preloader").fadeOut("slow");;
});
AOS.init();
</script>
</body>

</html>