<?php if($this->session->flashdata('success')):?>
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="successmodal" aria-hidden="true" id="modalsuccess">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content" style="position:relative;">
				<div class="d-flex justify-content-center">
					<svg  class="bi bi-x-circle  bg-light"  style="position:absolute;top: -20; border-radius: 25px;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
						<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
					</svg>
				</div>
				<div class="modal-body text-center py-5">              
                    <h5 class="font-weight-bold text-success"><?=$this->session->flashdata('success');?></h5>                 
                </div>               
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">ปิด</button>   
				</div>
			</div>
		</div>
	</div>
	<script>
		$(window).on('load',function(){
			$('#modalsuccess').modal('show');
		});
	</script>
<?php elseif($this->session->flashdata('fail')):?>
	<div  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modalfail">
        <div   class="modal-dialog modal-sm modal-dialog-centered">
            <div style="position: relative;" class="modal-content">
            <div class="d-flex justify-content-center">
                <svg  class="bi bi-x-circle  bg-light"  style="position:absolute;top: -20; border-radius: 25px;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                </div>
                <div class="modal-body text-center py-5">              
                        <h5 class="font-weight-bold text-danger"><?=$this->session->flashdata('fail');?></h5>                 
                </div>               
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>        
            </div>
        </div>
    </div>
	<script>
		$(window).on('load',function(){
			$('#modalfail').modal('show');
		});
	</script>
<?php endif;?>