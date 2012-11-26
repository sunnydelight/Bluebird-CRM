var messages = [];
var contacts = [];

cj(document).ready(function(){

	var first_name = cj('#tab1 .first_name').val();
	var last_name = cj('#tab1 .last_name').val();
	var city = cj('#tab1 .city').val();
	var phone = cj('#tab1 .phone').val();
	var street_address = cj('#tab1 .street_address').val();
	var email_address = cj('#tab1 .email_address').val();

	var reset = cj('#reset');
	var filter = cj('#filter');
	var assign = cj('#assign');
	var reassign = cj('#reassign');
	var create = cj('#add-contact');

	// Checking to see if we are in a browser that the placeholder tag is not yet supported in. We regressively add it here.
	placeholderSupport = ("placeholder" in document.createElement("input"));

	if(!placeholderSupport ){
 		cj('[placeholder]').focus(function() {
			var input = cj(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
			    input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = cj(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			cj(this).find('[placeholder]').each(function() {
				var input = cj(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});
	}else{
		// console.log('placeholder Support');
	}




	filter.live('click', function() {
		cj('#imapper-contacts-list').html('Searching...');

		// checks for deault data
		if(cj('#tab1 .first_name').val() != "First Name"){ var first_name = cj('#tab1 .first_name').val();}
		if(cj('#tab1 .last_name').val() != "Last Name"){ var last_name = cj('#tab1 .last_name').val();}
		if(cj('#tab1 .city').val() != "City"){var city = cj('#tab1 .city').val();}
		if(cj('#tab1 .phone').val() != "Phone Number"){var phone = cj('#tab1 .phone').val();}
		if(cj('#tab1 .street_address').val() != "Street Address"){var street_address = cj('#tab1 .street_address').val();}
		if(cj('#tab1 .email_address').val() != "Email Address"){var email_address = cj('#tab1 .email_address').val();}

		cj.ajax({
			url: '/civicrm/imap/ajax/contacts',
			data: {
				state: '1031',  
				city: city,
				phone: phone,
				email_address: email_address,
				street_address: street_address,
				first_name: first_name,
				last_name: last_name
			},
			success: function(data,status) {
				if(data != null || data != ''){
					contacts = cj.parseJSON(data);
					if(contacts.length < 1){
						cj('#imapper-contacts-list').html('No Results Found');
					}else{
						cj('.contacts-list').html('').append("<strong>"+(contacts.length )+' Found</strong>');
						buildContactList();
					}
				}
			}
		});
		return false;
	});

	assign.click(function() {
		var messageId = cj('#email_id').val();
		var imapId = cj('#imap_id').val();
		var contactRadios = cj('input[name=contact_id]');
		var contactIds = '';

		cj.each(contactRadios, function(idx, val) {
			if(cj(val).attr('checked')) {
				if(contactIds != '')
					contactIds = contactIds+',';
				contactIds = contactIds + cj(val).val();
			}
		});
		if(contactIds !='' ){
			cj.ajax({
				url: '/civicrm/imap/ajax/assignMessage',
				data: {
					messageId: messageId,
					imapId: imapId,
					contactId: contactIds
				},
				success: function(data, status) {
					cj(".imapper-message-box[data-id='"+messageId+"']").remove();
					var old_total = parseInt(cj("#total_number").html(),10);
					cj("#total_number").html(old_total-1);
	           		cj("#find-match-popup").dialog('close');  
	           		help_message('Message assigned to contact');
	           		
				}
			});
			return false;
		}else{
			alert("Please Choose a contact");
		};
	
	});

	// reassign activity to contact on the matched page
	reassign.click(function() {
		var activityId = cj('#email_id').val();
		var contact = cj('#imap_id').val();
		// only grabs the 1st one
		var contactRadios = cj('input[name=contact_id]').val();

		cj.ajax({
			url: '/civicrm/imap/ajax/reassignActivity',
			data: {
				id: activityId,
				contact: contact,
				change: contactRadios
			},
			success: function(data, status) {
    			window.setTimeout('location.reload()', 10);
           		help_message('Message assigned to contact');
			}
		});
		return false;
	});

	create.click(function() {
		var messageId = cj('#email_id').val();
		var create_imap_id = cj('#imap_id').val();
		var create_first_name = cj("#tab2 .first_name").val();
		var create_last_name = cj("#tab2 .last_name").val();
		var create_email_address = cj("#tab2 .email_address").val();
		var create_phone = cj("#tab2 #phone").val();
		var create_street_address = cj("#tab2 .street_address").val();
		var create_street_address_2 = cj("#tab2 .street_address_2").val();
		var create_zip = cj("#tab2 .zip").val();
		var create_city = cj("#tab2 .city").val();

		if((!!first_name) && (!!last_name)){
			cj.ajax({
				url: '/civicrm/imap/ajax/createNewContact',
				data: {
					messageId: create_messageId,
					imap_id: create_imap_id,
					first_name: create_first_name,
					last_name: create_last_name, 
					email_address: create_email_address, 
					phone: create_phone, 
					street_address: create_street_address, 
					street_address_2: create_street_address_2,
					postal_code: create_zip,
					city: create_city
				},
				success: function(data, status) {
					contactData = cj.parseJSON(data);
					cj.ajax({
						url: '/civicrm/imap/ajax/assignMessage',
						data: {
							messageId: messageId,
							imapId: imap_id,
							contactId: contactData.contact
						},
						success: function(data, status) {
							cj("#find-match-popup").dialog('close'); 
							cj(".imapper-message-box[data-id='"+messageId+"']").remove();
							help_message('Contact created and message Assigned');
							var old_total = parseInt(cj("#total_number").html(),10);
							help_message('Activity Deleted');
							cj("#total_number").html(old_total-1);
						},
						error: function(){
    						alert('failure');
  						}

				});
				}			
			});
			return false;
		}else{
			alert("Please Enter a first & last name");
		};
	});

	if(cj("#Activities").length){
		pullActivitiesHeaders();
 		autocomplete_setup();
 	}else if(cj("#Unmatched").length){
		pullMessageHeaders();
	}

	// add a delete conform popup
	cj( "#delete-confirm" ).dialog({
		modal: true,
		width: 350,
		autoOpen: false,
		resizable: false,
		draggable: false	
	});
	
	// delete confirm & processing 
	cj(".delete").live('click', function() {
		var messageId = cj(this).parent().parent().attr('data-id');
		var imapId = cj(this).parent().parent().attr('data-imap_id');
		var contactId = cj(this).parent().parent().attr('data-contact_id');
		var row = cj(this).parent().parent();

		cj( "#delete-confirm" ).dialog({
			buttons: {
				"Delete": function() {
					cj( this ).dialog( "close" );
					row.remove();
					if(cj("#Activities").length){
						cj.ajax({
							url: '/civicrm/imap/ajax/deleteActivity',
							data: {id: messageId},
							success: function(data,status) {
								cj("#"+messageId).remove();
								var old_total = parseInt(cj("#total_number").html(),10);
								help_message('Activity Deleted');
								cj("#total_number").html(old_total-1);
								// console.log(old_total-1);
							},
							error: function(){
    							alert('unable to delete activity');
  							}
						});
					}else{
						cj.ajax({
							url: '/civicrm/imap/ajax/deleteMessage',
							data: {id: messageId,
						    imapId: imapId },
							success: function(data,status) {
								cj("#"+messageId+'_'+imapId).remove();
 								var old_total = parseInt(cj("#total_number").html(),10);
 								help_message('Message Deleted');

								cj("#total_number").html(old_total-1);
							},
							error: function(){
    							alert('unable to delete Message');
  							}
						});
					}
				},
				Cancel: function() {
					cj( this ).dialog( "close" );
				}
			}
		});
		cj( "#delete-confirm" ).dialog('open');
	});


	// multi_delete confirm & processing 
	cj(".multi_delete").live('click', function() {

		cj("#loading-popup").dialog('open');

		// delete_ids = message id / activity id 
		// delete_secondary = imap id / contact id 
		var delete_ids = new Array();
		var delete_secondary = new Array();
		var rows = new Array();

		cj('#imapper-messages-list input:checked').each(function() {
 			delete_ids.push(cj(this).attr('name'));
			delete_secondary.push(cj(this).attr('data-id'));
			rows.push(cj(this).parent().parent().attr('id')); // not awesome but ok
		});

		cj( "#delete-confirm" ).dialog({
			buttons: {
				"Delete": function() {
					cj( this ).dialog( "close" );
					if(cj("#Activities").length){
						cj.each(delete_ids, function(key, value) { 
							cj.ajax({
								url: '/civicrm/imap/ajax/deleteActivity',
								data: {id: value},
								success: function(data,status) {
									cj('#'+rows[key]).remove();
									var old_total = parseInt(cj("#total_number").html(),10);
									cj("#total_number").html(old_total-1);
									help_message('Activities Deleted');
								},
								error: function(){
    								alert('unable to delete Activitie');
  								}
							});
						});		
					}else{
						cj.each(delete_ids, function(key, value) { 
							cj.ajax({
								url: '/civicrm/imap/ajax/deleteMessage',
										data: {id: value,
									    imapId: delete_secondary[key] },
								success: function(data,status) {
									cj('#'+rows[key]).remove();
									var old_total = parseInt(cj("#total_number").html(),10);
									cj("#total_number").html(old_total-1);
									help_message('Messages Deleted');
								},
								error: function(){
    								alert('unable to delete Message');
  								}
							});
						});				
					}

				},
				Cancel: function() {
					cj( this ).dialog( "close" );
				}
			}
		});	
		cj("#delete-confirm").dialog({ title:  "Delete "+delete_ids.length+" Messages ?"});
		cj("#loading-popup").dialog('close');
		cj("#delete-confirm").dialog('open');
	});
	
	// add a find match popup
	cj( "#find-match-popup" ).dialog({
		modal: true,
		height: 500,
		width: 960, // in ie the popup was overflowing
		autoOpen: false,
		resizable: false,
		title: 'Loading Data',
		draggable: false
	});

	// add a loading icon popup
	cj( "#loading-popup" ).dialog({
		modal: true,
		width: 200,
		autoOpen: false,
		resizable: false,
		title: 'Please Wait',
		draggable: false
	});

	// add a loading icon popup
	cj( "#tagging-popup" ).dialog({
		modal: true,
		height: 500,
		width: 500,
		autoOpen: false,
		resizable: false,
		title: 'Loading Data',
		draggable: false
	});

	// adding (single / multiple) tags to (single / multiple) contacts,
	// function works for multi contact tagging and single
	cj(".push_tag").live('click', function(){
		var tags = new Array();

		// add to activity, contact, or both ?
		if((cj('.Activity-checkbox').attr('checked')) && (!cj('.Contact-checkbox').attr('checked'))){
			var activityId = cj("#activityId").val();
		}else if((cj('.Contact-checkbox').attr('checked')) && (!cj('.Activity-checkbox').attr('checked'))){
			var contactId = cj("#contactId").val();
		}else if((cj('.Contact-checkbox').attr('checked')) && (cj('.Activity-checkbox').attr('checked'))){
			var activityId = cj("#activityId").val();
			var contactId = cj("#contactId").val();
		}else{
			alert("please check Contact or Activity");
			return;
		}

		// delete_ids = message id / activity id 
		// delete_secondary = imap id / contact id 
		var delete_ids = new Array();
		var delete_secondary = new Array();
		var rows = new Array();

		cj('#imapper-messages-list input:checked').each(function() {
 			delete_ids.push(cj(this).attr('name'));
			delete_secondary.push(cj(this).attr('data-id'));
			rows.push(cj(this).parent().parent().attr('id')); // not awesome but ok
		});

		// if there are tags selected
		// we can either have multiple rows, or single rows selected 
		if(cj(".autocomplete-tags-bank").html().length){
			cj('.autocomplete-tags-bank a').each(function(index) {
				var tagId = cj(this).attr('data-id');
		    	cj.ajax({
					url: '/civicrm/imap/ajax/addTags',
					data: {activityId: activityId, contactId: contactId, tags: tagId},
					success: function(data,status) {
						if(delete_ids.length > 0 ){
							cj.each(delete_ids, function(key, value) { 
								cj.ajax({
									url: '/civicrm/imap/ajax/unproccessedActivity',
									data: {id: value},
									success: function(data,status) { 
										cj("#tagging-popup").dialog('close');
										help_message('tag added!');
										cj("#"+value).remove();
										var old_total = parseInt(cj("#total_number").html(),10);
										help_message('Activity Deleted');
										cj("#total_number").html(old_total-1);
									},
									error: function(){
	    								alert('unable to add tag');
	  								}
								});
							});
						}else{
							var activityId = cj("#activityId").val();
							cj.ajax({
								url: '/civicrm/imap/ajax/unproccessedActivity',
								data: {id: activityId},
								success: function(data,status) { 
									cj("#tagging-popup").dialog('close');
									help_message('tag added!');
									cj("#"+activityId).remove();
									help_message('Tag Added');
									var old_total = parseInt(cj("#total_number").html(),10);
									help_message('Activity Deleted');
									cj("#total_number").html(old_total-1);
								},
								error: function(){
    								alert('unable to add tag');
  								}
							});
						}
						
					}
			 	});
			});
		}else{
			alert("please select a tag");
			return;
		}
	});


	// adding from list of tags to selected tag area 
	cj(".tag-item").live('click', function() { 
 		var tag_id = cj(this).attr('data-id');
		var tag_text = cj(this).html();
 		if( cj(".autocomplete-tags-bank ."+tag_id).length < 1 )  {
			cj(".autocomplete-tags-bank").append('<a data-id="'+tag_id+'" class="tag-selected '+tag_id+'" href="#">'+tag_text+'<span class="tag-delete-icon">&nbsp;</span></a>');
		}		
	});

	// remove from list of tags
	cj(".tag-selected").live('click', function() { 
		cj(this).remove();		
	});


	// add tag modal 
	cj(".add_tag").live('click', function() { 
		cj("#loading-popup").dialog('open');
		var activityId = cj(this).parent().parent().attr('data-id');
		var contactId = cj(this).parent().parent().attr('data-contact_id');
		cj.ajax({
			url: '/civicrm/imap/ajax/activityDetails',
			data: {id: activityId, contact: contactId },
			success: function(data,status) {
		 		cj("#loading-popup").dialog('close');
		 		messages = cj.parseJSON(data);
		 		cj('#tagging-popup-header').append("<strong>From: </strong>"+messages.fromName +"  <i>&lt;"+ messages.fromEmail+"&gt;</i><br/><strong>Subject: </strong>"+messages.subject+"<br/><strong>Date: </strong>"+messages.date+"<br/>");

		 		cj('#tagging-popup-header').html('').append("<strong>From: </strong>"+messages.fromName +"  <i>&lt;"+ messages.fromEmail+"&gt;</i><br/><strong>Subject: </strong>"+messages.subject+"<br/><strong>Date: </strong>"+messages.date+"<br/>");
				cj('#tagging-popup-header').append("<input class='hidden' type='hidden' id='activityId' value='"+activityId+"'><input class='hidden' type='hidden' id='contactId' value='"+contactId+"'>");

				if ((messages.forwardedEmail != '')){
					cj('#tagging-popup-header').append("<strong>Forwarded by: </strong>"+messages.forwardedName+" <i>&lt;"+ messages.forwardedEmail+"&gt;</i><br/>");
				}
				if ((messages.fromAddress)){
					cj('#tagging-popup-header').append("<strong>Address by: </strong>"+messages.fromAddress);
				}
 			
				cj("#tagging-popup").dialog({ title:  "Tagging: "+ short_subject(messages.subject,50) });
				cj("#tagging-popup").dialog('open');
 				 
			},
			error: function(){
				alert('unable to find activity');
			}
		 });
	});

	// dropdown functions on the matched Messages page
	// modal for tagging multiple contacts, different header info is shown
	// opens the add_tag popup
	cj(".multi_tag").live('click', function() { 
		cj("#loading-popup").dialog('open');
		var contactIds = new Array();
		var activityIds = new Array();

		cj('#imapper-messages-list input:checked').each(function() {
			activityIds.push(cj(this).attr('name'));
			contactIds.push(cj(this).attr('data-id'));
		});

 		cj("#loading-popup").dialog('close');
 		cj('#tagging-popup-header').html('');
 		cj('#tagging-popup-header').append("<input class='hidden' type='hidden' id='activityId' value='"+activityIds+"'><input class='hidden' type='hidden' id='contactId' value='"+contactIds+"'>");
 		cj("#tagging-popup").dialog({ title: "Tagging "+contactIds.length+" Matched messages"});
 		cj("#tagging-popup").dialog('open');

	});

	/// remove activity from the activities screen, but don't delete it 
	cj(".clear_activity").live('click', function() { 	
		cj("#loading-popup").dialog('open');
		var activityId = cj(this).parent().parent().attr('data-id');

		cj( "#delete-confirm" ).dialog({
			buttons: {
				"Clear": function() {
					cj.ajax({
						url: '/civicrm/imap/ajax/unproccessedActivity',
						data: {id: activityId},
						success: function(data,status) { 
							help_message('Activity Removed');
						},
						error: function(){
							alert('unable to delete Activity');
						}
					});
					var old_total = parseInt(cj("#total_number").html(),10);
					cj("#total_number").html(old_total-1);
					cj("#"+activityId).remove();
					cj( this ).dialog( "close" );
				},
				Cancel: function() {
					cj( this ).dialog( "close" );
				}
			}
		});
		cj("#delete-confirm").dialog({ title:  "Remove this Messages from this list?"});
		cj("#loading-popup").dialog('close');
		cj("#delete-confirm").dialog('open');
	});
	

	cj(".multi_clear").live('click', function() { 
		cj("#loading-popup").dialog('open');
 		var delete_ids = new Array();

		cj('#imapper-messages-list input:checked').each(function() {
			delete_ids.push(cj(this).attr('name'));
		});
		cj( "#delete-confirm" ).dialog({
			buttons: {
				"Clear": function() {
					cj.each(delete_ids, function(key, value) {
						cj.ajax({
							url: '/civicrm/imap/ajax/unproccessedActivity',
							data: {id: value},
							success: function(data,status) { 
								cj('#'+value).remove();
								var old_total = parseInt(cj("#total_number").html(),10);
								cj("#total_number").html(old_total-1);
								cj("#delete-confirm").dialog( "close" );
								help_message('Activity Removed');
							},
							error: function(){
								alert('unable to delete Activity');
							}
						});
					});
				},
				Cancel: function() {
					cj( this ).dialog( "close" );
				}
			}
		});
		cj("#delete-confirm").dialog({ title:  "Clear "+delete_ids.length+" Messages ?"});
		cj("#loading-popup").dialog('close');
		cj( "#delete-confirm" ).dialog('open');

	});





	// opening find match window
	cj(".find_match").live('click', function() {
		cj("#loading-popup").dialog('open');

		var messageId = cj(this).parent().parent().attr('data-id');
		var imapId = cj(this).parent().parent().attr('data-imap_id');
		var firstName = cj(this).parent().parent().children('.name').attr('data-firstName');
		var lastName = cj(this).parent().parent().children('.name').attr('data-lastName');

		cj('#imapper-contacts-list').html('');
		cj.ajax({
			url: '/civicrm/imap/ajax/message',
			data: {id: messageId,
				   imapId: imapId },
			success: function(data,status) {
				cj("#loading-popup").dialog('close');
				messages = cj.parseJSON(data);
				var icon ='';
		 		if( messages.attachmentfilename ||  messages.attachmentname ||  messages.attachment){ 
					if(messages.attachmentname ){var name = messages.attachmentname}else{var name = messages.attachmentfilename};
					icon = '<div class="ui-icon ui-icon-link attachment" title="'+name+'"></div>'
				}
				cj('#message_left_header').html('').append("<strong>From: </strong>"+messages.fromName +"  <i>&lt;"+ messages.fromEmail+"&gt;</i><br/><strong>Subject: </strong>"+messages.subject+" "+ icon+"<br/><strong>Date: </strong>"+messages.date+"<br/>");
				if ((messages.forwardedEmail != '')){
					cj('#message_left_header').append("<strong>Forwarded by: </strong>"+messages.forwardedName+" <i>&lt;"+ messages.forwardedEmail+"&gt;</i><br/>");
				}
				cj('#message_left_email').html(messages.details);
				cj('.first_name, .last_name, .phone, .street_address, .street_address_2, .city, .email_address').val('');
				cj('#email_id').val(messageId);
				cj('#imap_id').val(imapId);
				cj("#find-match-popup").dialog({ title:  "Reading: "+short_subject(messages.subject,100) });
				cj("#find-match-popup").dialog('open');
 				cj("#tabs").tabs();
 				cj('.email_address').val(messages.fromEmail);

 				cj('#filter').click();
				cj('.first_name').val(firstName);
				cj('.last_name').val(lastName);
			},
			error: function(){
				alert('unable to load message');
			}
		});
	});

	// Edit a match allready assigned to an Activity 
	cj(".pre_find_match").live('click', function() {
		cj("#loading-popup").dialog('open');

		var activityId = cj(this).parent().parent().attr('data-id');
		var contactId = cj(this).parent().parent().attr('data-contact_id');
		var firstName = cj(this).parent().parent().children('.name').attr('data-firstName');
		var lastName = cj(this).parent().parent().children('.name').attr('data-lastName');

		cj('.first_name').val(firstName);
	    cj('.last_name').val(lastName);

		cj('#imapper-contacts-list').html('');

		cj.ajax({
			url: '/civicrm/imap/ajax/activityDetails',
			data: {id: activityId, contact: contactId },
			success: function(data,status) {
		 		cj("#loading-popup").dialog('close');
		 		messages = cj.parseJSON(data);
		 		cj('#message_left_header').html('').append("<strong>From: </strong>"+messages.fromName +"  <i>&lt;"+ messages.fromEmail+"&gt;</i><br/><strong>Subject: </strong>"+messages.subject+"<br/><strong>Date: </strong>"+messages.date+"<br/>");
				if ((messages.forwardedEmail != '')){
					cj('#message_left_header').append("<strong>Forwarded by: </strong>"+messages.forwardedName+" <i>&lt;"+ messages.forwardedEmail+"&gt;</i><br/>");
				}
				cj('#message_left_email').html(messages.details);
				cj('#email_id').val(activityId);
				cj('#imap_id').val(contactId);
				cj("#find-match-popup").dialog({ title:  "Reading: "+short_subject(messages.subject,100)  });
				cj("#find-match-popup").dialog('open');
 				cj("#tabs").tabs();
 
  				cj('#imapper-contacts-list').html('').append("<strong>currently matched to : </strong><br/>"+messages.fromName +"  <i>&lt;"+ messages.fromEmail+"&gt;</i> <br/> "+messages.fromAddress);
			},
			error: function(){
				alert('unable to Load Message');
			}
		 });
	});


	// not quite ready for this, doesn't uncheck things
	// cj(".imapper-address-box").live('click', function() {
	// 	var radioButton = cj(this).find(".imapper-contact-select-button");
	// 	if (radioButton.is(':checked')){
 //       		radioButton.attr('checked', false); 
 //    	}else{
 //        	radioButton.attr('checked', true); 
 //    	}
	// });

});

// function switchName(nameVal){
//     var nameLength = nameVal.length;
//     var nameSplit = nameVal.split(" ");
//     var lastLength = nameLength - nameSplit[0].length;
//     var lastNameLength = nameSplit[0].length + 1;
//     var lastName = nameVal.slice(lastNameLength);
//     cj('.first_name').val(nameSplit[0]);
//     cj('.last_name').val(lastName);
// }

function firstName(nameVal){
    var nameLength = nameVal.length;
    var nameSplit = nameVal.split(" ");
 	return nameSplit[0];
}

function lastName(nameVal){
    var nameLength = nameVal.length;
    var nameSplit = nameVal.split(" ");
    var lastLength = nameLength - nameSplit[0].length;
    var lastNameLength = nameSplit[0].length + 1;
    var lastName = nameVal.slice(lastNameLength);
 	return lastName;
}


function pullMessageHeaders() {
	cj.ajax({
		url: '/civicrm/imap/ajax/unmatchedMessages',
		success: function(data,status) {
			messages = cj.parseJSON(data);
			buildMessageList();
		},
		error: function(){
			alert('unable to Load Messages');
		}
	});
}

function pullActivitiesHeaders() {
	cj.ajax({
		url: '/civicrm/imap/ajax/getMatchedMessages',
		success: function(data,status) {
			messages = cj.parseJSON(data);
			buildActivitiesList();
		},
		error: function(){
			alert('unable to Load Messages');
		}
	});
}

function destroyReSortable(){ 
	var oTable = cj("#sortable_results").dataTable();
  	oTable.fnDestroy();
	makeListSortable();
}

function makeListSortable(){
	cj("#sortable_results").dataTable({
		"aaSorting": [[ 4, "desc" ]],
	//	"aoColumnDefs": [  { "bSearchable": true, "bVisible": false, "aTargets": [ 3 ] }  ],
		"iDisplayLength": 50,
	//	"bStateSave": true,
		'aTargets': [ 1 ] 
	});
	// unbind the sort on the
	cj("th.checkbox").unbind('click');
	checks();

}

// a complicated checkbox method,
function checks(){
	cj('.checkbox_switch').click(function() {
		cj('th.checkbox').click();
	});
	cj('th.checkbox').click(function() {
		if(cj('.checkbox_switch').is(':checked')){
			cj('input.checkbox_switch').removeAttr('checked');
			cj('#imapper-messages-list input:checkbox').removeAttr('checked');
		}else{
   			cj('#imapper-messages-list input:checkbox').attr('checked', true);
			cj('.checkbox_switch').attr("checked", true);
		}
	});
}

function buildMessageList() {
	if(messages == '' || messages == null){
		cj('#imapper-messages-list').html('<strong>No Messages found</strong>');
		cj("#total_number").html('0');
	}else{
		var messagesHtml = '';
		var total_results =0;
		cj.each(messages, function(key, value) {
			total_results++;
			var icon ='';
			messagesHtml += '<tr id="'+value.uid+'_'+value.imap_id+'" data-id="'+value.uid+'" data-imap_id="'+value.imap_id+'" class="imapper-message-box"> <td class="" ><input class="checkboxieout" type="checkbox" name="'+value.uid+'"  data-id="'+value.imap_id+'"/></td>';
			if( value.from_name != ''){
				messagesHtml += '<td class="name" data-firstName="'+firstName(value.from_name)+'" data-lastName="'+lastName(value.from_name)+'">';
				messagesHtml += value.from_name;
				messagesHtml += '</td>';
			}else {
				messagesHtml += '<td class="name">N/A</td>';
			}
			if( value.attachmentfilename ||  value.attachmentname ||  value.attachment){ 
				if(value.attachmentname ){var name = value.attachmentname}else{var name = value.attachmentfilename};
				icon = '<div class="ui-icon ui-icon-link attachment" title="'+name+'"></div>'
			}
			messagesHtml += '<td class="email">'+value.from_email +'</td>';
	 		messagesHtml += '<td class="subject" title="'+value.subject +'">'+short_subject(value.subject,50) +' '+icon+'</td>';
			messagesHtml += '<td class="date">'+value.date +'</td>';
			messagesHtml += '<td class="forwarder">'+value.forwarder + " "+ value.forwarder_time +'</td>';
			messagesHtml += '<td class="Actions"><span class="find_match"><a href="#">Find match</a></span> | <span class="delete"><a href="#">Delete</a></span></td> </tr>';
		});
		cj('#imapper-messages-list').html(messagesHtml);
		cj("#total_number").html(total_results);
		makeListSortable();
		cj('.checkbox').removeClass('sorting');
		cj('.Actions').removeClass('sorting');

	}
}

// matched messages screen 
function buildActivitiesList() {
	if(messages == '' || messages == null){
		cj('#imapper-messages-list').html('<strong>No Messages found</strong>');
		cj("#total_number").html('0');
	}else{
		var messagesHtml = '';
		var total_results =0;
		cj.each(messages, function(key, value) {
			total_results++;
	 		messagesHtml += '<tr id="'+value.activitId+'" data-id="'+value.activitId+'" data-contact_id="'+value.contactId+'" class="imapper-message-box"> <td class="" ><input class="checkboxieout" type="checkbox" name="'+value.activitId+'" data-id="'+value.contactId+'"/></td>';
			
			if( value.fromName != ''){
				messagesHtml += '<td class="name" data-firstName="'+value.firstName +'" data-lastName="'+value.lastName +'">';
				if( value.contactType == 'Individual'){
					messagesHtml += '<div title="Individual" class="icon crm-icon Individual-icon"></div>';
				}else{
					messagesHtml += '<div title="Organization" class="icon crm-icon Organization-icon"></div>';
				}
				messagesHtml += '<a href="/civicrm/contact/view?reset=1&cid='+value.contactId+'">'+value.fromName +'<a/>';
				messagesHtml += '</td>';
			}else {
				messagesHtml += '<td class="name">N/A</td>';
			}
			messagesHtml += '<td class="email">'+short_subject(value.fromEmail,20)+'</td>';
			messagesHtml += '<td class="subject" title="'+value.subject +'">'+short_subject(value.subject,50) +'</td>';
			messagesHtml += '<td class="date">'+value.date +'</td>';
			messagesHtml += '<td class="forwarder">'+value.forwarder +'</td>';
			messagesHtml += '<td class="Actions"> <span class="pre_find_match"><a href="#">Edit</a></span> |  <span class="add_tag"><a href="#">Tag</a></span> | <span class="clear_activity"><a href="#">Clear</a></span> | <span class="delete"><a href="#">Delete</a></span></td> </tr>';
		});
		cj('#imapper-messages-list').html(messagesHtml);
		cj("#total_number").html(total_results);
		makeListSortable();
	}
}


function buildContactList() {
	var contactsHtml = '';
	cj.each(contacts, function(key, value) {
		// calculate the aprox age
		if(value.birth_date){
			var date = new Date();
			var year  = date.getFullYear();
			var birth_year = value.birth_date.substring(0,4);
			var age = year - birth_year;
		}
		contactsHtml += '<div class="imapper-contact-box" data-id="'+value.contact_id+'">';
		contactsHtml += '<div class="imapper-address-select-box">';
		contactsHtml += '<input type="checkbox" class="imapper-contact-select-button" name="contact_id" value="'+value.contact_id+'" />';
		contactsHtml += '</div>';
		contactsHtml += '<div class="imapper-address-box">';
		if(value.display_name){ contactsHtml += value.display_name + '<br/>'; };
		if(value.birth_date){ contactsHtml += '<strong>'+age+'</strong> - '+value.birth_date + '<br/>';}
		if(value.email){ contactsHtml += value.email + '<br/>'; }
		if(value.street_address){ contactsHtml += value.street_address + '<br/>'; }
		if(value.city){ contactsHtml += value.city + ', ' + value.abbreviation + ' ' + value.postal_code + '<br/>'; }
 		contactsHtml += '</div></div>';
		contactsHtml += '<div class="clear"></div>';
	});
	cj('#imapper-contacts-list').append(contactsHtml);

}


// displays a help window + current date time 
function help_message(message){

	var d = new Date();
	var h = d.getHours();
	var m = d.getMinutes();
	var s = d.getSeconds();
	var rm = h+"_"+m+"_"+s;
	cj("#top").append("<div class='"+h+"_"+m+"_"+s+"' id='help' ><p>"+message+" <small>"+h+":"+m+":"+s+"</small></p></div>");

	setTimeout(function(){
	    cj("."+rm).fadeOut(1000);
	}, 10000);

}

function short_subject(subject, length){
	if(subject){
	 	if (subject.length > length ){
 		var safe_subject = subject.substring(0,length)+"...";
		return safe_subject;
 		}else{
 			return subject;
 		}	
	}else{
		return "no subject";
 	}	

 }

function autocomplete_setup () {
		var value = cj("#autocomplete_tag").val();
		cj("#autocomplete_tag").autocomplete("/civicrm/imap/ajax/getTags",  {
	        width: 320,
	        data: {  name: value },
	        dataType: 'json',
	        scroll: true,
	        scrollHeight: 300,
	        parse: function(data) {
	       		messagesHtml = '';

				var array = new Array();
				cj(".autocomplete-dropdown").html('');

				cj(data.items).each(function(i, item) {
					messagesHtml += '<a data-id="'+item.value+'" class="tag-item" href="#">'+item.label+'</a><br/>'
				});
				cj(".autocomplete-dropdown").html(messagesHtml);
				return array;
        	},
    	});	 
}