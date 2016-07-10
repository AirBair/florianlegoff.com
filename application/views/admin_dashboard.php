<!DOCTYPE html>
<html>
	<head>
		<title>Admin Zone | Florian LE GOFF</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="<?=site_url()?>assets/images/favicon.png" />
		<link rel="stylesheet" href="<?=css_url('bootstrap.min')?>" />
		<link rel="stylesheet" href="<?=css_url('style')?>" />
		<script type="text/javascript" src="<?=js_url('jquery.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('bootstrap.min')?>"></script>
	</head>
	<body class="bg_lightblack">
		<div class="row" id="adminZone">
			<div class="col-md-2 bg_darkred" id="adminNav">
				<div class="row text-center">
					<figure>
						<img src="/assets/images/florian_le_goff.jpg" alt="Florian LE GOFF avatar" class="img-circle" />
					</figure>
					<h4>FLORIAN LE GOFF</h4>
					<p>
						<a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
						<a href="<?=base_url('admin/logout')?>"><span class="glyphicon glyphicon-log-out"></span></a>
					</p>
				</div>
				<nav class="row text-center">
					<ul>
						<li><a href="#admin_config">CONFIG</a></li>
						<li><a href="#admin_projects">PROJECTS</a></li>
						<li><a href="#admin_skills">SKILLS</a></li>
						<li><a href="#admin_services">SERVICES</a></li>
						<li><a href="#admin_mails">MAILBOX</a></li>
						<li><a href="#admin_file_upload">FILE UPLOAD</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-md-10" id="adminContent">

				<section id="admin_config">
					<h2 class="text-center">CONFIG</h2>
					<p class="text-right">
						<button type="button" class="btn btn-success btnModal" data-target="#configModalForm" data-action="add" data-table="<?=$this->admin_model->_config?>"><span class="glyphicon glyphicon-plus"></span></button>
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>Config Label</th>
								<th>French Title</th>
								<th>English Title</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($configs as $config): ?>
								<tr>
									<td><?=$config['label']?></td>
									<td><?=$config['title_french']?></td>
									<td><?=$config['title_english']?></td>
									<td>
										<button type="button" class="btn btn-warning btnModal" data-target="#configModalForm" data-action="edit" data-table="<?=$this->admin_model->_config?>" data-value="<?=$config['label']?>"><span class="glyphicon glyphicon-pencil"></span></button>
										<button type="button" class="btn btn-danger btnModal" data-target="#configModalDelete" data-action="delete" data-table="<?=$this->admin_model->_config?>" data-value="<?=$config['label']?>"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="configModalForm" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-lg">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-header">
									<h4 class="col-sm-10"><span>Add</span> a Config</h4>
									<p class="col-sm-2 text-right darkred" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></p>
								</div>
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<label for="config_label">Label</label>
							      		<input type="text" name="config_label" id="config_label" class="form-control" required />

										<label for="config_title_french">French Title</label>
						      			<input type="text" name="config_title_french" id="config_title_french" class="form-control" required />

										<label for="config_title_english">English Title</label>
						      			<input type="text" name="config_title_english" id="config_title_english" class="form-control" required />

										<label for="config_content_french">French Content</label>
						      			<textarea name="config_content_french" id="config_content_french" class="form-control" required ></textarea>

										<label for="config_content_english">English Content</label>
										<textarea name="config_content_english" id="config_content_english" class="form-control" required ></textarea>

										<p class="text-center"><input type="submit" class="btn btn-success" value="Add"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
					<div class="modal fade" id="configModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
				</section>

				<section id="admin_projects">
					<h2 class="text-center">PROJECTS</h2>
					<p class="text-right">
						<button type="button" class="btn btn-success btnModal" data-target="#projectsModalForm" data-action="add" data-table="<?=$this->admin_model->_projects?>"><span class="glyphicon glyphicon-plus"></span></button>
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>Project</th>
								<th>Label</th>
								<th>French Subtitle</th>
								<th>English Subtitle</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($projects as $project): ?>
								<tr>
									<td><?=$project['title']?></td>
									<td><?=$project['label']?></td>
									<td><?=$project['subtitle_french']?></td>
									<td><?=$project['subtitle_english']?></td>
									<td>
										<button type="button" class="btn btn-warning btnModal" data-target="#projectsModalForm" data-action="edit" data-table="<?=$this->admin_model->_projects?>" data-value="<?=$project['label']?>"><span class="glyphicon glyphicon-pencil"></span></button>
										<button type="button" class="btn btn-danger btnModal" data-target="#projectsModalDelete" data-action="delete" data-table="<?=$this->admin_model->_projects?>" data-value="<?=$project['label']?>"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="projectsModalForm" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-lg">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-header">
									<h4 class="col-sm-10"><span>Add</span> Project</h4>
									<p class="col-sm-2 text-right darkred" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></p>
								</div>
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<label for="projects_label">Label</label>
							      		<input type="text" name="projects_label" id="projects_label" class="form-control" required />

										<label for="projects_title">Title</label>
						      			<input type="text" name="projects_title" id="projects_title" class="form-control" required />

										<label for="projects_title_french">French SubTitle</label>
						      			<input type="text" name="projects_subtitle_french" id="projects_title_french" class="form-control" required />

										<label for="projects_title_english">English SubTitle</label>
						      			<input type="text" name="projects_subtitle_english" id="projects_title_english" class="form-control" required />

										<label for="projects_content_french">French Description</label>
						      			<textarea name="projects_description_french" id="projects_content_french" class="form-control" required ></textarea>

										<label for="projects_content_english">English Description</label>
										<textarea name="projects_description_english" id="projects_content_english" class="form-control" required ></textarea>

										<label for="projects_customer">Customer</label>
						      			<input type="text" name="projects_customer" id="projects_customer" class="form-control" required />

										<label for="projects_webdesign">Webdesign</label>
										<textarea name="projects_webdesign" class="form-control" id="projects_webdesign" required ></textarea>

										<label for="projects_date_realisation">Date Realisation (YYYY-MM-DD)</label>
										<input type="text" name="projects_date_realisation" id="projects_date_realisation" class="form-control" required />

										<label for="projects_techno">Techno</label>
						      			<input type="text" name="projects_techno" id="projects_techno" class="form-control" required />

										<label for="projects_url">URL</label>
						      			<input type="text" name="projects_url" id="projects_url" class="form-control" required />

										<label for="projects_position">Position</label>
						      			<input type="number" name="projects_position" id="projects_position" class="form-control" min="1" required />

										<p class="text-center"><input type="submit" class="btn btn-success" value="Add"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
					<div class="modal fade" id="projectsModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
				</section>

				<section id="admin_skills">
					<h2 class="text-center">SKILLS</h2>
					<p class="text-right">
						<button type="button" class="btn btn-success btnModal" data-target="#skills_groupsModalForm" data-action="add" data-table="<?=$this->admin_model->_skills_groups?>"><span class="glyphicon glyphicon-plus"></span></button>
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>French Name Skills Group</th>
								<th>English Name Skills Group</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($skills_groups as $skills_group): ?>
								<tr>
									<td><?=$skills_group['name_french']?></td>
									<td><?=$skills_group['name_english']?></td>
									<td>
										<button type="button" class="btn btn-warning btnModal" data-target="#skills_groupsModalForm" data-action="edit" data-table="<?=$this->admin_model->_skills_groups?>" data-value="<?=$skills_group['id']?>"><span class="glyphicon glyphicon-pencil"></span></button>
										<button type="button" class="btn btn-danger btnModal" data-target="#skills_groupsModalDelete" data-action="delete" data-table="<?=$this->admin_model->_skills_groups?>" data-value="<?=$skills_group['id']?>"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="skills_groupsModalForm" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-lg">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-header">
									<h4 class="col-sm-10"><span>Add</span> Skills Group</h4>
									<p class="col-sm-2 text-right darkred" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></p>
								</div>
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<label for="skills_groups_name_french">French Name</label>
						      			<input type="text" name="skills_groups_name_french" id="skills_groups_name_french" class="form-control" required />

										<label for="skills_groups_name_english">English Name</label>
						      			<input type="text" name="skills_groups_name_english" id="skills_groups_name_english" class="form-control" required />

										<label for="skills_groups_position">Position</label>
						      			<input type="number" name="skills_groups_position" id="skills_groups_position" class="form-control" min="1" required />

										<p class="text-center"><input type="submit" class="btn btn-success" value="Add"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
					<div class="modal fade" id="skills_groupsModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>

					<hr />

					<p class="text-right">
						<button type="button" class="btn btn-success btnModal" data-target="#skillsModalForm" data-action="add" data-table="<?=$this->admin_model->_skills_list?>"><span class="glyphicon glyphicon-plus"></span></button>
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>Logo</th>
								<th>Skill</th>
								<th>Mark</th>
								<th>Skills Group</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($skills_groups as $skills_group): ?>
								<?php foreach($this->admin_model->readSkills($skills_group['id']) as $skill): ?>
									<tr>
										<td><img src="<?=base_url('assets/images/skills/'.$skill['icon'])?>" alt="" /></td>
										<td><?=$skill['name_french']?></td>
										<td><?php for($i=1;$i<=$skill['mark'];$i++) echo '<span class="glyphicon glyphicon-star"></span>'; ?></td>
										<td><?=$skill['skills_group_name_english']?></td>
										<td>
											<button type="button" class="btn btn-warning btnModal" data-target="#skillsModalForm" data-action="edit" data-table="<?=$this->admin_model->_skills_list?>" data-value="<?=$skill['id']?>"><span class="glyphicon glyphicon-pencil"></span></button>
											<button type="button" class="btn btn-danger btnModal" data-target="#skillsModalDelete" data-action="delete" data-table="<?=$this->admin_model->_skills_list?>" data-value="<?=$skill['id']?>"><span class="glyphicon glyphicon-trash"></span></button>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="skillsModalForm" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-lg">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-header">
									<h4 class="col-sm-10"><span>Add</span> Skill</h4>
									<p class="col-sm-2 text-right darkred" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></p>
								</div>
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<label for="skills_skills_group">Skills Group</label>
										<select name="skills_skills_group" id="skills_skills_group" class="form-control" required>
											<option value="">Select</option>
											<?php foreach($skills_groups as $skills_group): ?>
												<option value="<?=$skills_group['id']?>"><?=$skills_group['name_english']?></option>
											<?php endforeach; ?>
										</select>
										<label for="skills_name_french">French Name</label>
						      			<input type="text" name="skills_name_french" id="skills_name_french" class="form-control" required />

										<label for="skills_name_english">English Name</label>
						      			<input type="text" name="skills_name_english" id="skills_name_english" class="form-control" required />

										<label for="skills_icon">Icon</label>
						      			<input type="text" name="skills_icon" id="skills_icon" class="form-control" required />

										<label for="skills_mark">Mark</label>
										<select name="skills_mark" id="skills_mark" class="form-control" required>
											<option value="">Select</option>
											<?php for($i=1;$i<=5;$i++): ?>
												<option value="<?=$i?>"><?=$i?></option>
											<?php endfor; ?>
										</select>

										<label for="skills_position">Position</label>
						      			<input type="number" name="skills_position" id="skills_position" class="form-control" min="1" required />

										<p class="text-center"><input type="submit" class="btn btn-success" value="Add"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
					<div class="modal fade" id="skillsModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
				</section>

				<section id="admin_services">
					<h2 class="text-center">SERVICES</h2>
					<p class="text-right">
						<button type="button" class="btn btn-success btnModal" data-target="#servicesModalForm" data-action="add" data-table="<?=$this->admin_model->_services?>"><span class="glyphicon glyphicon-plus"></span></button>
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>Icon</th>
								<th>French Name</th>
								<th>English Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($services as $service): ?>
								<tr>
									<td><span class="glyphicon glyphicon-<?=$service['icon']?>"></span></td>
									<td><?=$service['name_french']?></td>
									<td><?=$service['name_english']?></td>
									<td>
										<button type="button" class="btn btn-warning btnModal" data-target="#servicesModalForm" data-action="edit" data-table="<?=$this->admin_model->_services?>" data-value="<?=$service['id']?>"><span class="glyphicon glyphicon-pencil"></span></button>
										<button type="button" class="btn btn-danger btnModal" data-target="#servicesModalDelete" data-action="delete" data-table="<?=$this->admin_model->_services?>" data-value="<?=$service['id']?>"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="servicesModalForm" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-lg">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-header">
									<h4 class="col-sm-10"><span>Add</span> Service</h4>
									<p class="col-sm-2 text-right darkred" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></p>
								</div>
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<label for="services_name_french">French Name</label>
										<input type="text" name="services_name_french" id="services_name_french" class="form-control" required />

										<label for="services_name_english">English Name</label>
										<input type="text" name="services_name_english" id="services_name_english" class="form-control" required />

										<label for="services_icon">Icon</label>
										<input type="text" name="services_icon" id="services_icon" class="form-control" required />

										<label for="services_content_french">French Content</label>
						      			<textarea name="services_content_french" id="services_content_french" class="form-control" required ></textarea>

										<label for="services_content_english">English Content</label>
										<textarea name="services_content_english" id="services_content_english" class="form-control" required ></textarea>

										<label for="services_position">Position</label>
						      			<input type="number" name="services_position" id="services_position" class="form-control" min="1" required />

										<p class="text-center"><input type="submit" class="btn btn-success" value="Add"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
					<div class="modal fade" id="servicesModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
				</section>

				<section id="admin_mails">
					<h2 class="text-center">MAILBOX</h2>
					<?php foreach($mails as $mail): ?>
						<div class="row">
							<p class="col-md-10">
								<strong>From :</strong> <?php echo $mail['name']; ?> ~ <?php echo $mail['email']; ?><br /><br />
								<strong>Date :</strong> <?php echo date('d/m/Y H:i:s', strtotime($mail['sending_date'])); ?><br /><br />
								<strong>Objet :</strong> <?php echo $mail['object']; ?><br /><br />
								<strong>Message :</strong>
							</p>
							<p class="col-md-2 text-right">
								<button type="button" class="btn btn-danger btnModal" data-target="#mailsModalDelete" data-action="delete" data-table="<?=$this->admin_model->_mails?>" data-value="<?=$mail['id']?>"><span class="glyphicon glyphicon-trash"></span></button>
							</p>
							<p class="col-md-12"><?php echo $mail['message']; ?></p>
						</div>
					<?php endforeach; ?>

					<div class="modal fade" id="mailsModalDelete" tabindex="-1" role="dialog">
				  		<div class="modal-dialog modal-sm">
				    		<div class="modal-content bg_darkblack">
								<div class="modal-body">
									<?=form_open('', array('class'=>'formAjax'))?>
										<p>Are you sure ?</p>
										<p class="text-right"><input type="submit" class="btn btn-danger" value="Yes Delete !"></p>
									<?=form_close()?>
					    		</div>
							</div>
				  		</div>
					</div>
				</section>

				<section id="admin_file_upload">
					<h2 class="text-center">File Upload</h2>

					<?=form_open_multipart('admin/file_upload', array('class'=>'col-md-8 col-md-offset-2'))?>

						<?php echo $this->session->flashdata('upload_success');  ?>
						<?php echo $this->session->flashdata('upload_error');  ?>

						<label for="upload_path">Upload Path</label>
						<input type="text" name="upload_path" id="upload_path" class="form-control" value="images/" required>

						<label for="upload_name">Save with name :</label>
						<input type="text" name="upload_name" id="upload_name" class="form-control" required />

						<label for="upload_file">File To Upload</label>
						<input type="file" name="upload_file" id="upload_file"/>

						<p class="text-center"><input type="submit" class="btn btn-success" value="Upload" /></p>
					<?=form_close()?>
				</section>


			</div>
		</div>

		<script type="text/javascript" src="<?=js_url('administration')?>"></script>
	</body>
</html>
