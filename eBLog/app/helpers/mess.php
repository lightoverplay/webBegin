      <?php if (isset($_SESSION['messenge'])):?>
               <div class="msg alert <?php $_SESSION['type']; ?> ">
                  <li><?php echo $_SESSION['messenge']; ?> </li>           
               </div>
      <?php unset($_SESSION['messenge'],$_SESSION['type']); ?>
      <?php endif; ?>