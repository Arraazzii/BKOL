<?php
$input = $this->session->flashdata('input');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">

<style type="text/css" media="screen">
    /*
     * Specific styles of signin component
     */
    /*
     * General styles
     */
     body, html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    .wrapper{
        background: #f4f6f9 !important;

    }
    .card-container.card {
        max-width: 350px;
        padding: 40px 40px;
         border-radius: 3px;
        box-shadow: 0 2px 6px rgb(0,0,0,0.1);
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
     * Card component
     */
     .card {
        background-color: #F7F7F7;
        /* just in case there no content*/
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 50px;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        /*-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    /*
     * Form styles
     */
     .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }

    .reauth-email {
        display: block;
        color: #404040;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin #username,
    .form-signin #idjenisuser,
    .form-signin #password {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin select,
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        /*border-color: rgb(104, 145, 162);*/
        outline: 0;
        /*-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);*/
        /*box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);*/
    }

    .btn.btn-signin {
        /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
        padding: 0px;
        font-weight: 700;
        font-size: 14px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
    }
    /* Style the Image Used to Trigger the Modal */
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        margin-top: 150px;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 55px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    } 
</style>
<div class="card card-container">
    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <p id="profile-name" class="profile-name-card"></p>
    <form method="post" class="form-signin" action="<?= site_url('login/dologin') ?>">
        <span id="reauth-email" class="reauth-email">
            <?php
            if ($this->session->flashdata('error') != null){
                echo $this->session->flashdata('error');
            }
            ?>
        </span>
        <select id="idjenisuser" class="form-control" required name="idjenisuser">
            <option value="">-- Login sebagai --</option>
            <?php
            foreach ($MsJenisUserData->result() as $getcmb)
            {
                if ($input['idjenisuser'] == $getcmb->IDJenisUser)
                {
                    echo "<option value='".$getcmb->IDJenisUser."' selected=\"selected\">".$getcmb->NamaJenisUser ."</option>";
                }
                else
                {
                    echo "<option value='".$getcmb->IDJenisUser."'>".$getcmb->NamaJenisUser ."</option>";
                }
            }
            ?>
        </select>
        <input id="username" name="username" placeholder="Nama pengguna" required class="form-control" type="text" value="<?= $input != null ? $input['username'] : '' ?>" size="20">
        <input id="password" name="password" placeholder="Kata sandi" class="form-control" required type="password" value="" size="20">
        <input class="btn btn-lg btn-primary btn-block btn-signin" id="login" name="login" type="submit" value="Sign in">
    </form><!-- /form -->
    <a href="<?= site_url('lupasandi') ?>" class="forgot-password">
        Lupa kata sandi?
    </a>
</div><!-- /card-container -->

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <a href="<?php echo site_url('persyaratan/2') ?>"><img class="modal-content" id="img01"></a>
  <div id="caption"></div>
</div> 
<script type="text/javascript">
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    $("#idjenisuser").change(function(event) {
        if($("#idjenisuser").val() == '000002')
        {
            modal.style.display = "block";
            modalImg.src = '<?php echo site_url('assets/css/images/notiflogin.jpg') ?>';
        }
    });

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
      modal.style.display = "none";
  } 
</script>