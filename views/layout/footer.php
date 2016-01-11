        </div>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<?php if(isset($js)){
		foreach($js as $script){
			echo '<script src="'.base_url().'assets/js/'.$script.'.js"></script>';
		}
	} ?>
    </body>
</html>