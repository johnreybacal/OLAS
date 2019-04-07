<header class="header header-inverse bg-ui-general"> 
		<div class="header-info">
				<h2 class="header-title"><strong>Admission</strong> <small class="subtitle">List of all Student admissions.</small></h2>
		</div>
</header>
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="col-md-10">
				<label>Student ID: </label>
				<input type="text" id="StudentId" />
				<button class="btn btn-block btn-info" onclick="Admission.search()">Admit</button>
			</div>
			<div class="col-md-2 col-sm-12" style="margin-bottom: 30px;">
				<label>&nbsp;</label>
				<button class="btn btn-block btn-info" onclick="ExportExcel('student-admission-table')">Export</button>
			</div>
			<div class="col-4">
                    <label>Filter by College</label>
                    <select id="CollegeId" name="Patron type" data-provide="selectpicker" title="Choose College" data-live-search="true" class="form-control show-tick"></select>
                </div>
			<div class="table-responsive" id="student-admission-table-container">
				<table id="student-admission-table" class="table table-striped table-bordered display nowrap r3" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Patron/GenerateStudentAdmission") ?>">
					<thead>
						<tr class="bg-info">							
							<th>Date and Time</th>
							<th>Student Id</th>							
							<th>Name</th>							
							<th>Course</th>
							<th>College</th>							
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		Admission.init();
	});

	var Admission = {

		init: function(){
			$.ajax({
                url: "<?php echo base_url("College/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#CollegeId').empty();
                    $.each(i, function(index, data){                        
                        $('#CollegeId').append('<option value = "' + data.CollegeId + '">' + data.Name + '</option>');
                    })
                    $('#CollegeId').selectpicker('refresh');
                }
            })
            $('#CollegeId').change(function(){
				var url = "<?php echo base_url("Patron/GenerateStudentAdmission/") ?>"
                if($(this).selectpicker('val') >= 1){					
					url = "<?php echo base_url("Patron/GenerateStudentAdmission/") ?>" + $(this).selectpicker('val');
				}				
				$('#student-admission-table-container').html(                
					'<div class="table-responsive">' + 
						'<table id="student-admission-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
							'<thead>' +
								'<tr class="bg-info">' + 
									"<th>Date and Time</th>" +
									"<th>Student Id</th>" +				
									"<th>Name</th>" +			
									"<th>Course</th>" +
									"<th>College</th>" +
								'</tr>' +
							'</thead>' + 
						'</table>' +              
					'</div>'
				);
            });     
		},

		search: function(){			
			$.ajax({
				url: "<?php echo base_url('Patron/StudentAdmit/'); ?>" + $('#StudentId').val(),
				success: function(i){
					if(i == 1){
						Admission.reset();
					}else{						
						swal("No record", "The Student ID does not exist", "warning");
					}
				},
				error: function(){
					swal("Oops", "Something went wrong", "error");
				}
			})
		},

		reset: function () {
			$('#student-admission-table').DataTable().ajax.reload();
		}
	}
</script>