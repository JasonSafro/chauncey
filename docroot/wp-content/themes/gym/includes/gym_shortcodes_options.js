(function() {
    tinymce.PluginManager.add('infinite_tc_button', function( editor, url ) {
        editor.addButton( 'infinite_tc_button', {
            title: 'Infinite Shortcodes',
            type: 'menubutton',
            icon: 'wp_code',
            menu: [
				{
                    text: 'Columns',
                    value: '',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
                    menu: [
                        {
                            text: 'Columns - 1/1',
                            value: '[one]Dummy content[/one]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
                        {
                            text: 'Columns - 1/3 + 1/3 + 1/3',
                            value: '[one_third]Dummy content[/one_third][one_third]Dummy content[/one_third][one_third_last]Dummy content[/one_third_last]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: 'Columns - 2/3 + 1/3',
                            value: '[two_thirds]Dummy content[/two_thirds][one_third_last]Dummy content[/one_third_last]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: 'Columns - 1/3 + 2/3',
                            value: '[one_third]Dummy content[/one_third][two_thirds_last]Dummy content[/two_thirds_last]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: 'Columns - 1/2 + 1/2',
                            value: '[one_half]Dummy content[/one_half][one_half_last]Dummy content[/one_half_last]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: 'Columns - 1/4 + 1/4 + 1/4 + 1/4',
                            value: '[one_fourth]Dummy content[/one_fourth][one_fourth]Dummy content[/one_fourth][one_fourth]Dummy content[/one_fourth][one_fourth_last]Dummy content[/one_fourth_last]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        }
                    ]
                },
				{
                    text: 'Sliding graph',
                    value: '',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
                    menu: [
						{
						text: 'Sliding graph container',
						value: '[gym_graph_container]Delete this text and insert graph bars.[/gym_graph_container]',
						onclick: function() {
							editor.insertContent(this.value());
						}
					},
					{
						text: 'Sliding graph item',
						onclick: function() {
						editor.windowManager.open( {
							title: 'Sliding graph bar',
							body: [{
								type: 'textbox',
								name: 'title',
								label: 'Title',
								value: 'Graph'
							},
							{
								type: 'textbox',
								name: 'percent',
								label: 'Percent',
								value: '55'
							},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[gym_graph Title="' + e.data.title + '" Percent="' + e.data.percent + '"]' );
							}
						});
						}
					}
                    ]
                },
				{
            		text: 'Social icons list',
            		value: '[gym_social_icons]twitter, http://twitter.com/username, facebook, https://www.facebook.com/username[/gym_social_icons]',
            		onclick: function() {
            			editor.insertContent(this.value());
            		}
           		},
				{
					text: 'Map',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Map',
						body: [{
							type: 'textbox',
							name: 'location',
							label: 'Location',
							value: 'Chicago'
						},
						{
							type: 'textbox',
							name: 'zoom',
							label: 'Zoom',
							value: '15'
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_google_map location="' + e.data.location + '" zoom="' + e.data.zoom + '"]' );
						}
					});
					}
				},
				{
					text: 'List',
					onclick: function() {
					editor.windowManager.open( {
						title: 'List',
						body: [{
							type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Arrow list', value: 'arrow-list'},
								{text: 'Check list', value: 'check-list'},
								{text: 'Marker list', value: 'marker-list'},
								{text: 'More list', value: 'more-list'},
								{text: 'Pin list', value: 'pin-list'},
								{text: 'Star list', value: 'star-list'},
								{text: 'Counter list', value: 'counter-list'},
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_list style="' + e.data.style + '"]' + 'Insert list[/gym_list]' );
						}
					});
					}
				},
				{
					text: 'Divider',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Divider',
						body: [{
							type: 'textbox',
							name: 'divider',
							label: 'Divider',
							value: '80'
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_divider height="' + e.data.divider + '"]' );
						}
					});
					}
				},
				{
					text: 'Border divider',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Border divider',
						body: [{
							type: 'textbox',
							name: 'top',
							label: 'Top',
							value: '40'
						},
						{
							type: 'textbox',
							name: 'bottom',
							label: 'Bottom',
							value: '40'
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_border_divider top="' + e.data.top + '" bottom="' + e.data.bottom + '"]' );
						}
					});
					}
				},
				{
					text: 'Toggle element',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Toggle element',
						body: [{
							type: 'textbox',
							name: 'caption',
							label: 'Caption',
							value: 'Trainer'
						},
						{
							type: 'textbox',
							name: 'text',
							label: 'Text',
							value: 'Dummy text'
						},
						{
							type: 'listbox', 
							name: 'type', 
							label: 'Type', 
							'values': [
								{text: 'Toggle', value: 'no'},
								{text: 'Accordion', value: 'yes'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_toggle collapsable="' + e.data.type + '" caption="' + e.data.caption + '"]' + e.data.text + '[/gym_toggle]' );
						}
					});
					}
				},
				{
					text: 'Buttons',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Buttons',
						body: [{
							type: 'textbox',
							name: 'text',
							label: 'Text on button',
							value: 'Button'
						},
						{
							type: 'textbox',
							name: 'url',
							label: 'URL',
							value: 'http://8grids.com'
						},
						{
							type: 'listbox', 
							name: 'target', 
							label: 'Target', 
							'values': [
								{text: 'Same tab', value: '_self'},
								{text: 'New tab', value: '_blank'}
							]
						},
						{
							type: 'listbox', 
							name: 'size', 
							label: 'Size', 
							'values': [
								{text: 'Small', value: 'btn-small'},
								{text: 'Medium', value: 'btn-medium'},
								{text: 'Large', value: 'btn-large'}
							]
						},
						{
							type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Rounded', value: 'rounded'},
								{text: 'Rectangle', value: ''}
							]
						},
						{
							type: 'listbox', 
							name: 'color', 
							label: 'Color', 
							'values': [
								{text: 'Grey', value: 'grey'},
								{text: 'Yellow', value: 'yellow'},
								{text: 'Orange', value: 'orange'},
								{text: 'Green', value: 'green'},
								{text: 'Teal Green', value: 'tealgreen'},
								{text: 'Blue', value: 'blue'},
								{text: 'Navy Blue', value: 'navyblue'},
								{text: 'Purple', value: 'purple'},
								{text: 'Magenta', value: 'magenta'},
								{text: 'Pink', value: 'pink'},
								{text: 'Red', value: 'red'},
								{text: 'Cream', value: 'cream'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_button text="' + e.data.text + '" url="' + e.data.url + '" target="' + e.data.target + '" size="' + e.data.size + '" style="' + e.data.style + '" color="' + e.data.color + '"]' );
						}
					});
					}
				},
				{
                    text: 'Icon box',
                    value: '',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
                    menu: [
							{
								text: 'Icon box container',
								value: '[gym_icon_boxes_container]Delete this text and insert icon boxes.[/gym_icon_boxes_container]',
								onclick: function() {
									editor.insertContent(this.value());
								}
							},
							{
								text: 'Icon box item',
								onclick: function() {
								editor.windowManager.open( {
									title: 'Icon box item',
									body: [{
										type: 'textbox',
										name: 'caption',
										label: 'Caption',
										value: 'Icon Title'
									},
									{
										type: 'listbox', 
										name: 'icon', 
										label: 'Icon', 
										'values': [
											{text: 'None', value: ''},
											{text: 'Baseball', value: 'wp-content/themes/fitness/images/icon-boxes/baseball.png'},
											{text: 'Basketball', value: 'wp-content/themes/fitness/images/icon-boxes/basketball.png'},
											{text: 'Bench press', value: 'wp-content/themes/fitness/images/icon-boxes/bench-press.png'},
											{text: 'Bike', value: 'wp-content/themes/fitness/images/icon-boxes/bike.png'},
											{text: 'Colors', value: 'wp-content/themes/fitness/images/icon-boxes/colors.png'},
											{text: 'Deadlift', value: 'wp-content/themes/fitness/images/icon-boxes/deadlift.png'},
											{text: 'Fonts', value: 'wp-content/themes/fitness/images/icon-boxes/fonts.png'},
											{text: 'Football', value: 'wp-content/themes/fitness/images/icon-boxes/football.png'},
											{text: 'Halter', value: 'wp-content/themes/fitness/images/icon-boxes/halter.png'},
											{text: 'Hiking', value: 'wp-content/themes/fitness/images/icon-boxes/hiking.png'},
											{text: 'Hiking solo', value: 'wp-content/themes/fitness/images/icon-boxes/hiking-solo.png'},
											{text: 'Jump Rope', value: 'wp-content/themes/fitness/images/icon-boxes/jump-rope.png'},
											{text: 'Kettlebell', value: 'wp-content/themes/fitness/images/icon-boxes/kettlebell.png'},
											{text: 'Locker', value: 'wp-content/themes/fitness/images/icon-boxes/locker.png'},
											{text: 'Pilates', value: 'wp-content/themes/fitness/images/icon-boxes/pilates.png'},
											{text: 'Responsive', value: 'wp-content/themes/fitness/images/icon-boxes/responsive.png'},
											{text: 'Shop', value: 'wp-content/themes/fitness/images/icon-boxes/Shop.png'},
											{text: 'Soccer', value: 'wp-content/themes/fitness/images/icon-boxes/soccer.png'},
											{text: 'Soccer ball', value: 'wp-content/themes/fitness/images/icon-boxes/soccer-ball.png'},
											{text: 'Squat', value: 'wp-content/themes/fitness/images/icon-boxes/squat.png'},
											{text: 'Strength', value: 'wp-content/themes/fitness/images/icon-boxes/strength.png'},
											{text: 'Swimming', value: 'wp-content/themes/fitness/images/icon-boxes/swimming.png'},
											{text: 'Swimming pool', value: 'wp-content/themes/fitness/images/icon-boxes/swimming-pool.png'},
											{text: 'Water botle', value: 'wp-content/themes/fitness/images/icon-boxes/water-botle.png'},
											{text: 'Weight lifting', value: 'wp-content/themes/fitness/images/icon-boxes/weight-lifting.png'},
											{text: 'Wrestling', value: 'wp-content/themes/fitness/images/icon-boxes/wrestling.png'},
											{text: 'Yoga', value: 'wp-content/themes/fitness/images/icon-boxes/yoga.png'}
										]
									},
									{
										type: 'textbox',
										name: 'url',
										label: 'URL',
										value: 'http://8grids.com'
									},
									{
										type: 'listbox', 
										name: 'target', 
										label: 'Target', 
										'values': [
											{text: 'Same tab', value: '_self'},
											{text: 'New tab', value: '_blank'}
										]
									},
									{
										type: 'textbox',
										name: 'about',
										label: 'About',
										value: 'Lorem ipsum dolor set amet...'
									},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[gym_icon_box icon="' + e.data.icon + '" url="' + e.data.url + '" target="' + e.data.target + '" caption="' + e.data.caption + '"]' + e.data.about + '[/gym_icon_box]' );
									}
								});
								}
							},
                    ]
                },
				{
					text: 'Icons',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Icons',
						body: [
						{
							type: 'listbox', 
							name: 'icon', 
							label: 'Icon', 
							'values': [
								{text: '000 glass', value: 'wp-content/themes/gym/images/icons/glyphicons_000_glass.png'},
								{text: '001 leaf', value: 'wp-content/themes/gym/images/icons/glyphicons_001_leaf.png'},
								{text: '002 dog', value: 'wp-content/themes/gym/images/icons/glyphicons_002_dog.png'},
								{text: '003 user', value: 'wp-content/themes/gym/images/icons/glyphicons_003_user.png'},
								{text: '004 girl', value: 'wp-content/themes/gym/images/icons/glyphicons_004_girl.png'},
								{text: '005 car', value: 'wp-content/themes/gym/images/icons/glyphicons_005_car.png'},
								{text: '006 user add', value: 'wp-content/themes/gym/images/icons/glyphicons_006_user_add.png'},
								{text: '007 user remove', value: 'wp-content/themes/gym/images/icons/glyphicons_007_user_remove.png'},
								{text: '008 film', value: 'wp-content/themes/gym/images/icons/glyphicons_008_film.png'},
								{text: '009 magic', value: 'wp-content/themes/gym/images/icons/glyphicons_009_magic.png'},
								{text: '010 envelope', value: 'wp-content/themes/gym/images/icons/glyphicons_010_envelope.png'},
								{text: '011 camera', value: 'wp-content/themes/gym/images/icons/glyphicons_011_camera.png'},
								{text: '012 heart', value: 'wp-content/themes/gym/images/icons/glyphicons_012_heart.png'},
								{text: '013 beach umbrella', value: 'wp-content/themes/gym/images/icons/glyphicons_013_beach_umbrella.png'},
								{text: '014 train', value: 'wp-content/themes/gym/images/icons/glyphicons_014_train.png'},
								{text: '015 print', value: 'wp-content/themes/gym/images/icons/glyphicons_015_print.png'},
								{text: '016 bin', value: 'wp-content/themes/gym/images/icons/glyphicons_016_bin.png'},
								{text: '017 music', value: 'wp-content/themes/gym/images/icons/glyphicons_017_music.png'},
								{text: '018 note', value: 'wp-content/themes/gym/images/icons/glyphicons_018_note.png'},
								{text: '019 heart empty', value: 'wp-content/themes/gym/images/icons/glyphicons_019_heart_empty.png'},
								{text: '020 home', value: 'wp-content/themes/gym/images/icons/glyphicons_020_home.png'},
								{text: '021 snowflake', value: 'wp-content/themes/gym/images/icons/glyphicons_021_snowflake.png'},
								{text: '022 fire', value: 'wp-content/themes/gym/images/icons/glyphicons_022_fire.png'},
								{text: '023 magnet', value: 'wp-content/themes/gym/images/icons/glyphicons_023_magnet.png'},
								{text: '024 parents', value: 'wp-content/themes/gym/images/icons/glyphicons_024_parents.png'},
								{text: '025 binoculars', value: 'wp-content/themes/gym/images/icons/glyphicons_025_binoculars.png'},
								{text: '026 road', value: 'wp-content/themes/gym/images/icons/glyphicons_026_road.png'},
								{text: '027 search', value: 'wp-content/themes/gym/images/icons/glyphicons_027_search.png'},
								{text: '028 cars', value: 'wp-content/themes/gym/images/icons/glyphicons_028_cars.png'},
								{text: '029 notes 2', value: 'wp-content/themes/gym/images/icons/glyphicons_029_notes_2.png'},
								{text: '030 pencil', value: 'wp-content/themes/gym/images/icons/glyphicons_030_pencil.png'},
								{text: '031 bus', value: 'wp-content/themes/gym/images/icons/glyphicons_031_bus.png'},
								{text: '032 wifi alt', value: 'wp-content/themes/gym/images/icons/glyphicons_032_wifi_alt.png'},
								{text: '033 luggage', value: 'wp-content/themes/gym/images/icons/glyphicons_033_luggage.png'},
								{text: '034 old man', value: 'wp-content/themes/gym/images/icons/glyphicons_034_old_man.png'},
								{text: '035 woman', value: 'wp-content/themes/gym/images/icons/glyphicons_035_woman.png'},
								{text: '036 file', value: 'wp-content/themes/gym/images/icons/glyphicons_036_file.png'},
								{text: '037 coins', value: 'wp-content/themes/gym/images/icons/glyphicons_037_coins.png'},
								{text: '038 airplane', value: 'wp-content/themes/gym/images/icons/glyphicons_038_airplane.png'},
								{text: '039 notes', value: 'wp-content/themes/gym/images/icons/glyphicons_039_notes.png'},
								{text: '040 stats', value: 'wp-content/themes/gym/images/icons/glyphicons_040_stats.png'},
								{text: '041 charts', value: 'wp-content/themes/gym/images/icons/glyphicons_041_charts.png'},
								{text: '042 pie chart', value: 'wp-content/themes/gym/images/icons/glyphicons_042_pie_chart.png'},
								{text: '043 group', value: 'wp-content/themes/gym/images/icons/glyphicons_043_group.png'},
								{text: '044 keys', value: 'wp-content/themes/gym/images/icons/glyphicons_044_keys.png'},
								{text: '045 calendar', value: 'wp-content/themes/gym/images/icons/glyphicons_045_calendar.png'},
								{text: '046 router', value: 'wp-content/themes/gym/images/icons/glyphicons_046_router.png'},
								{text: '047 camera small', value: 'wp-content/themes/gym/images/icons/glyphicons_047_camera_small.png'},
								{text: '048 dislikes', value: 'wp-content/themes/gym/images/icons/glyphicons_048_dislikes.png'},
								{text: '049 star', value: 'wp-content/themes/gym/images/icons/glyphicons_049_star.png'},
								{text: '050 link', value: 'wp-content/themes/gym/images/icons/glyphicons_050_link.png'},
								{text: '051 eye open', value: 'wp-content/themes/gym/images/icons/glyphicons_051_eye_open.png'},
								{text: '052 eye close', value: 'wp-content/themes/gym/images/icons/glyphicons_052_eye_close.png'},
								{text: '053 alarm', value: 'wp-content/themes/gym/images/icons/glyphicons_053_alarm.png'},
								{text: '054 clock', value: 'wp-content/themes/gym/images/icons/glyphicons_054_clock.png'},
								{text: '055 stopwatch', value: 'wp-content/themes/gym/images/icons/glyphicons_055_stopwatch.png'},
								{text: '056 projector', value: 'wp-content/themes/gym/images/icons/glyphicons_056_projector.png'},
								{text: '057 history', value: 'wp-content/themes/gym/images/icons/glyphicons_057_history.png'},
								{text: '058 truck', value: 'wp-content/themes/gym/images/icons/glyphicons_058_truck.png'},
								{text: '059 cargo', value: 'wp-content/themes/gym/images/icons/glyphicons_059_cargo.png'},
								{text: '060 compass', value: 'wp-content/themes/gym/images/icons/glyphicons_060_compass.png'},
								{text: '061 keynote', value: 'wp-content/themes/gym/images/icons/glyphicons_061_keynote.png'},
								{text: '062 paperclip', value: 'wp-content/themes/gym/images/icons/glyphicons_062_paperclip.png'},
								{text: '063 power', value: 'wp-content/themes/gym/images/icons/glyphicons_063_power.png'},
								{text: '064 lightbulb', value: 'wp-content/themes/gym/images/icons/glyphicons_064_lightbulb.png'},
								{text: '065 tag', value: 'wp-content/themes/gym/images/icons/glyphicons_065_tag.png'},
								{text: '066 tags', value: 'wp-content/themes/gym/images/icons/glyphicons_066_tags.png'},
								{text: '067 cleaning', value: 'wp-content/themes/gym/images/icons/glyphicons_067_cleaning.png'},
								{text: '068 ruller', value: 'wp-content/themes/gym/images/icons/glyphicons_068_ruller.png'},
								{text: '069 gift', value: 'wp-content/themes/gym/images/icons/glyphicons_069_gift.png'},
								{text: '070 umbrella', value: 'wp-content/themes/gym/images/icons/glyphicons_070_umbrella.png'},
								{text: '071 book', value: 'wp-content/themes/gym/images/icons/glyphicons_071_book.png'},
								{text: '072 bookmark', value: 'wp-content/themes/gym/images/icons/glyphicons_072_bookmark.png'},
								{text: '073 wifi', value: 'wp-content/themes/gym/images/icons/glyphicons_073_wifi.png'},
								{text: '074 cup', value: 'wp-content/themes/gym/images/icons/glyphicons_074_cup.png'},
								{text: '075 stroller', value: 'wp-content/themes/gym/images/icons/glyphicons_075_stroller.png'},
								{text: '076 headphones', value: 'wp-content/themes/gym/images/icons/glyphicons_076_headphones.png'},
								{text: '077 headset', value: 'wp-content/themes/gym/images/icons/glyphicons_077_headset.png'},
								{text: '078 warning sign', value: 'wp-content/themes/gym/images/icons/glyphicons_078_warning_sign.png'},
								{text: '079 signal', value: 'wp-content/themes/gym/images/icons/glyphicons_079_signal.png'},
								{text: '080 retweet', value: 'wp-content/themes/gym/images/icons/glyphicons_080_retweet.png'},
								{text: '081 refresh', value: 'wp-content/themes/gym/images/icons/glyphicons_081_refresh.png'},
								{text: '082 roundabout', value: 'wp-content/themes/gym/images/icons/glyphicons_082_roundabout.png'},
								{text: '083 random', value: 'wp-content/themes/gym/images/icons/glyphicons_083_random.png'},
								{text: '084 heat', value: 'wp-content/themes/gym/images/icons/glyphicons_084_heat.png'},
								{text: '085 repeat', value: 'wp-content/themes/gym/images/icons/glyphicons_085_repeat.png'},
								{text: '086 display', value: 'wp-content/themes/gym/images/icons/glyphicons_086_display.png'},
								{text: '087 log book', value: 'wp-content/themes/gym/images/icons/glyphicons_087_log_book.png'},
								{text: '088 adress book', value: 'wp-content/themes/gym/images/icons/glyphicons_088_adress_book.png'},
								{text: '089 building', value: 'wp-content/themes/gym/images/icons/glyphicons_089_building.png'},
								{text: '090 eyedropper', value: 'wp-content/themes/gym/images/icons/glyphicons_090_eyedropper.png'},
								{text: '091 adjust', value: 'wp-content/themes/gym/images/icons/glyphicons_091_adjust.png'},
								{text: '092 tint', value: 'wp-content/themes/gym/images/icons/glyphicons_092_tint.png'},
								{text: '093 crop', value: 'wp-content/themes/gym/images/icons/glyphicons_093_crop.png'},
								{text: '094 vector path square', value: 'wp-content/themes/gym/images/icons/glyphicons_094_vector_path_square.png'},
								{text: '095 vector path circle', value: 'wp-content/themes/gym/images/icons/glyphicons_095_vector_path_circle.png'},
								{text: '096 vector path polygon', value: 'wp-content/themes/gym/images/icons/glyphicons_096_vector_path_polygon.png'},
								{text: '097 vector path line', value: 'wp-content/themes/gym/images/icons/glyphicons_097_vector_path_line.png'},
								{text: '098 vector path curve', value: 'wp-content/themes/gym/images/icons/glyphicons_098_vector_path_curve.png'},
								{text: '099 vector path all', value: 'wp-content/themes/gym/images/icons/glyphicons_099_vector_path_all.png'},
								{text: '100 font', value: 'wp-content/themes/gym/images/icons/glyphicons_100_font.png'},
								{text: '101 italic', value: 'wp-content/themes/gym/images/icons/glyphicons_101_italic.png'},
								{text: '102 bold', value: 'wp-content/themes/gym/images/icons/glyphicons_102_bold.png'},
								{text: '103 text underline', value: 'wp-content/themes/gym/images/icons/glyphicons_103_text_underline.png'},
								{text: '104 text strike', value: 'wp-content/themes/gym/images/icons/glyphicons_104_text_strike.png'},
								{text: '105 text height', value: 'wp-content/themes/gym/images/icons/glyphicons_105_text_height.png'},
								{text: '106 text width', value: 'wp-content/themes/gym/images/icons/glyphicons_106_text_width.png'},
								{text: '107 text resize', value: 'wp-content/themes/gym/images/icons/glyphicons_107_text_resize.png'},
								{text: '108 left indent', value: 'wp-content/themes/gym/images/icons/glyphicons_108_left_indent.png'},
								{text: '109 right indent', value: 'wp-content/themes/gym/images/icons/glyphicons_109_right_indent.png'},
								{text: '110 align left', value: 'wp-content/themes/gym/images/icons/glyphicons_110_align_left.png'},
								{text: '111 align center', value: 'wp-content/themes/gym/images/icons/glyphicons_111_align_center.png'},
								{text: '112 align right', value: 'wp-content/themes/gym/images/icons/glyphicons_112_align_right.png'},
								{text: '113 justify', value: 'wp-content/themes/gym/images/icons/glyphicons_113_justify.png'},
								{text: '114 list', value: 'wp-content/themes/gym/images/icons/glyphicons_114_list.png'},
								{text: '115 text smaller', value: 'wp-content/themes/gym/images/icons/glyphicons_115_text_smaller.png'},
								{text: '116 text bigger', value: 'wp-content/themes/gym/images/icons/glyphicons_116_text_bigger.png'},
								{text: '117 embed', value: 'wp-content/themes/gym/images/icons/glyphicons_117_embed.png'},
								{text: '118 embed close', value: 'wp-content/themes/gym/images/icons/glyphicons_118_embed_close.png'},
								{text: '119 table', value: 'wp-content/themes/gym/images/icons/glyphicons_119_table.png'},
								{text: '120 message full', value: 'wp-content/themes/gym/images/icons/glyphicons_120_message_full.png'},
								{text: '121 message empty', value: 'wp-content/themes/gym/images/icons/glyphicons_121_message_empty.png'},
								{text: '122 message in', value: 'wp-content/themes/gym/images/icons/glyphicons_122_message_in.png'},
								{text: '123 message out', value: 'wp-content/themes/gym/images/icons/glyphicons_123_message_out.png'},
								{text: '124 message plus', value: 'wp-content/themes/gym/images/icons/glyphicons_124_message_plus.png'},
								{text: '125 message minus', value: 'wp-content/themes/gym/images/icons/glyphicons_125_message_minus.png'},
								{text: '126 message ban', value: 'wp-content/themes/gym/images/icons/glyphicons_126_message_ban.png'},
								{text: '127 message flag', value: 'wp-content/themes/gym/images/icons/glyphicons_127_message_flag.png'},
								{text: '128 message lock', value: 'wp-content/themes/gym/images/icons/glyphicons_128_message_lock.png'},
								{text: '129 message new', value: 'wp-content/themes/gym/images/icons/glyphicons_129_message_new.png'},
								{text: '130 inbox', value: 'wp-content/themes/gym/images/icons/glyphicons_130_inbox.png'},
								{text: '131 inbox plus', value: 'wp-content/themes/gym/images/icons/glyphicons_131_inbox_plus.png'},
								{text: '132 inbox minus', value: 'wp-content/themes/gym/images/icons/glyphicons_132_inbox_minus.png'},
								{text: '133 inbox lock', value: 'wp-content/themes/gym/images/icons/glyphicons_133_inbox_lock.png'},
								{text: '134 inbox in', value: 'wp-content/themes/gym/images/icons/glyphicons_134_inbox_in.png'},
								{text: '135 inbox out', value: 'wp-content/themes/gym/images/icons/glyphicons_135_inbox_out.png'},
								{text: '136 cogwheel', value: 'wp-content/themes/gym/images/icons/glyphicons_136_cogwheel.png'},
								{text: '137 cogwheels', value: 'wp-content/themes/gym/images/icons/glyphicons_137_cogwheels.png'},
								{text: '138 picture', value: 'wp-content/themes/gym/images/icons/glyphicons_138_picture.png'},
								{text: '139 adjust alt', value: 'wp-content/themes/gym/images/icons/glyphicons_139_adjust_alt.png'},
								{text: '140 database lock', value: 'wp-content/themes/gym/images/icons/glyphicons_140_database_lock.png'},
								{text: '141 database plus', value: 'wp-content/themes/gym/images/icons/glyphicons_141_database_plus.png'},
								{text: '142 database minus', value: 'wp-content/themes/gym/images/icons/glyphicons_142_database_minus.png'},
								{text: '143 database ban', value: 'wp-content/themes/gym/images/icons/glyphicons_143_database_ban.png'},
								{text: '144 folder open', value: 'wp-content/themes/gym/images/icons/glyphicons_144_folder_open.png'},
								{text: '145 folder plus', value: 'wp-content/themes/gym/images/icons/glyphicons_145_folder_plus.png'},
								{text: '146 folder minus', value: 'wp-content/themes/gym/images/icons/glyphicons_146_folder_minus.png'},
								{text: '147 folder lock', value: 'wp-content/themes/gym/images/icons/glyphicons_147_folder_lock.png'},
								{text: '148 folder flag', value: 'wp-content/themes/gym/images/icons/glyphicons_148_folder_flag.png'},
								{text: '149 folder new', value: 'wp-content/themes/gym/images/icons/glyphicons_149_folder_new.png'},
								{text: '150 edit', value: 'wp-content/themes/gym/images/icons/glyphicons_150_edit.png'},
								{text: '151 new window', value: 'wp-content/themes/gym/images/icons/glyphicons_151_new_window.png'},
								{text: '152 check', value: 'wp-content/themes/gym/images/icons/glyphicons_152_check.png'},
								{text: '153 unchecked', value: 'wp-content/themes/gym/images/icons/glyphicons_153_unchecked.png'},
								{text: '154 more windows', value: 'wp-content/themes/gym/images/icons/glyphicons_154_more_windows.png'},
								{text: '155 show big thumbnails', value: 'wp-content/themes/gym/images/icons/glyphicons_155_show_big_thumbnails.png'},
								{text: '156 show thumbnails', value: 'wp-content/themes/gym/images/icons/glyphicons_156_show_thumbnails.png'},
								{text: '157 show thumbnails with lines', value: 'wp-content/themes/gym/images/icons/glyphicons_157_show_thumbnails_with_lines.png'},
								{text: '158 show lines', value: 'wp-content/themes/gym/images/icons/glyphicons_158_show_lines.png'},
								{text: '159 playlist', value: 'wp-content/themes/gym/images/icons/glyphicons_159_playlist.png'},
								{text: '160 imac', value: 'wp-content/themes/gym/images/icons/glyphicons_160_imac.png'},
								{text: '161 macbook', value: 'wp-content/themes/gym/images/icons/glyphicons_161_macbook.png'},
								{text: '162 ipad', value: 'wp-content/themes/gym/images/icons/glyphicons_162_ipad.png'},
								{text: '163 iphone', value: 'wp-content/themes/gym/images/icons/glyphicons_163_iphone.png'},
								{text: '164 iphone transfer', value: 'wp-content/themes/gym/images/icons/glyphicons_164_iphone_transfer.png'},
								{text: '165 iphone exchange', value: 'wp-content/themes/gym/images/icons/glyphicons_165_iphone_exchange.png'},
								{text: '166 ipod', value: 'wp-content/themes/gym/images/icons/glyphicons_166_ipod.png'},
								{text: '167 ipod shuffle', value: 'wp-content/themes/gym/images/icons/glyphicons_167_ipod_shuffle.png'},
								{text: '168 ear plugs', value: 'wp-content/themes/gym/images/icons/glyphicons_168_ear_plugs.png'},
								{text: '169 phone', value: 'wp-content/themes/gym/images/icons/glyphicons_169_phone.png'},
								{text: '170 step backward', value: 'wp-content/themes/gym/images/icons/glyphicons_170_step_backward.png'},
								{text: '171 fast backward', value: 'wp-content/themes/gym/images/icons/glyphicons_171_fast_backward.png'},
								{text: '172 rewind', value: 'wp-content/themes/gym/images/icons/glyphicons_172_rewind.png'},
								{text: '173 play', value: 'wp-content/themes/gym/images/icons/glyphicons_173_play.png'},
								{text: '174 pause', value: 'wp-content/themes/gym/images/icons/glyphicons_174_pause.png'},
								{text: '175 stop', value: 'wp-content/themes/gym/images/icons/glyphicons_175_stop.png'},
								{text: '176 forward', value: 'wp-content/themes/gym/images/icons/glyphicons_176_forward.png'},
								{text: '177 fast forward', value: 'wp-content/themes/gym/images/icons/glyphicons_177_fast_forward.png'},
								{text: '178 step forward', value: 'wp-content/themes/gym/images/icons/glyphicons_178_step_forward.png'},
								{text: '179 eject', value: 'wp-content/themes/gym/images/icons/glyphicons_179_eject.png'},
								{text: '180 facetime video', value: 'wp-content/themes/gym/images/icons/glyphicons_180_facetime_video.png'},
								{text: '181 download alt', value: 'wp-content/themes/gym/images/icons/glyphicons_181_download_alt.png'},
								{text: '182 mute', value: 'wp-content/themes/gym/images/icons/glyphicons_182_mute.png'},
								{text: '183 volume down', value: 'wp-content/themes/gym/images/icons/glyphicons_183_volume_down.png'},
								{text: '184 volume up', value: 'wp-content/themes/gym/images/icons/glyphicons_184_volume_up.png'},
								{text: '185 screenshot', value: 'wp-content/themes/gym/images/icons/glyphicons_185_screenshot.png'},
								{text: '186 move', value: 'wp-content/themes/gym/images/icons/glyphicons_186_move.png'},
								{text: '187 more', value: 'wp-content/themes/gym/images/icons/glyphicons_187_more.png'},
								{text: '188 brightness reduce', value: 'wp-content/themes/gym/images/icons/glyphicons_188_brightness_reduce.png'},
								{text: '189 brightness increase', value: 'wp-content/themes/gym/images/icons/glyphicons_189_brightness_increase.png'},
								{text: '190 circle plus', value: 'wp-content/themes/gym/images/icons/glyphicons_190_circle_plus.png'},
								{text: '191 circle minus', value: 'wp-content/themes/gym/images/icons/glyphicons_191_circle_minus.png'},
								{text: '192 circle remove', value: 'wp-content/themes/gym/images/icons/glyphicons_192_circle_remove.png'},
								{text: '193 circle ok', value: 'wp-content/themes/gym/images/icons/glyphicons_193_circle_ok.png'},
								{text: '194 circle question mark', value: 'wp-content/themes/gym/images/icons/glyphicons_194_circle_question_mark.png'},
								{text: '195 circle info', value: 'wp-content/themes/gym/images/icons/glyphicons_195_circle_info.png'},
								{text: '196 circle exclamation mark', value: 'wp-content/themes/gym/images/icons/glyphicons_196_circle_exclamation_mark.png'},
								{text: '197 remove', value: 'wp-content/themes/gym/images/icons/glyphicons_197_remove.png'},
								{text: '198 ok', value: 'wp-content/themes/gym/images/icons/glyphicons_198_ok.png'},
								{text: '199 ban', value: 'wp-content/themes/gym/images/icons/glyphicons_199_ban.png'},
								{text: '200 download', value: 'wp-content/themes/gym/images/icons/glyphicons_200_download.png'},
								{text: '201 upload', value: 'wp-content/themes/gym/images/icons/glyphicons_201_upload.png'},
								{text: '202 shopping cart', value: 'wp-content/themes/gym/images/icons/glyphicons_202_shopping_cart.png'},
								{text: '203 lock', value: 'wp-content/themes/gym/images/icons/glyphicons_203_lock.png'},
								{text: '204 unlock', value: 'wp-content/themes/gym/images/icons/glyphicons_204_unlock.png'},
								{text: '205 electricity', value: 'wp-content/themes/gym/images/icons/glyphicons_205_electricity.png'},
								{text: '206 ok 2', value: 'wp-content/themes/gym/images/icons/glyphicons_206_ok_2.png'},
								{text: '207 remove 2', value: 'wp-content/themes/gym/images/icons/glyphicons_207_remove_2.png'},
								{text: '208 cart out', value: 'wp-content/themes/gym/images/icons/glyphicons_208_cart_out.png'},
								{text: '209 cart in', value: 'wp-content/themes/gym/images/icons/glyphicons_209_cart_in.png'},
								{text: '210 left arrow', value: 'wp-content/themes/gym/images/icons/glyphicons_210_left_arrow.png'},
								{text: '211 right arrow', value: 'wp-content/themes/gym/images/icons/glyphicons_211_right_arrow.png'},
								{text: '212 down arrow', value: 'wp-content/themes/gym/images/icons/glyphicons_212_down_arrow.png'},
								{text: '213 up arrow', value: 'wp-content/themes/gym/images/icons/glyphicons_213_up_arrow.png'},
								{text: '214 resize small', value: 'wp-content/themes/gym/images/icons/glyphicons_214_resize_small.png'},
								{text: '215 resize full', value: 'wp-content/themes/gym/images/icons/glyphicons_215_resize_full.png'},
								{text: '216 circle arrow left', value: 'wp-content/themes/gym/images/icons/glyphicons_216_circle_arrow_left.png'},
								{text: '217 circle arrow right', value: 'wp-content/themes/gym/images/icons/glyphicons_217_circle_arrow_right.png'},
								{text: '218 circle arrow top', value: 'wp-content/themes/gym/images/icons/glyphicons_218_circle_arrow_top.png'},
								{text: '219 circle arrow down', value: 'wp-content/themes/gym/images/icons/glyphicons_219_circle_arrow_down.png'},
								{text: '220 play button', value: 'wp-content/themes/gym/images/icons/glyphicons_220_play_button.png'},
								{text: '221 unshare', value: 'wp-content/themes/gym/images/icons/glyphicons_221_unshare.png'},
								{text: '222 share', value: 'wp-content/themes/gym/images/icons/glyphicons_222_share.png'},
								{text: '223 chevron-right', value: 'wp-content/themes/gym/images/icons/glyphicons_223_chevron-right.png'},
								{text: '224 chevron-left', value: 'wp-content/themes/gym/images/icons/glyphicons_224_chevron-left.png'},
								{text: '225 bluetooth', value: 'wp-content/themes/gym/images/icons/glyphicons_225_bluetooth.png'},
								{text: '226 euro', value: 'wp-content/themes/gym/images/icons/glyphicons_226_euro.png'},
								{text: '227 usd', value: 'wp-content/themes/gym/images/icons/glyphicons_227_usd.png'},
								{text: '228 gbp', value: 'wp-content/themes/gym/images/icons/glyphicons_228_gbp.png'},
								{text: '229 retweet 2', value: 'wp-content/themes/gym/images/icons/glyphicons_229_retweet_2.png'},
								{text: '230 moon', value: 'wp-content/themes/gym/images/icons/glyphicons_230_moon.png'},
								{text: '231 sun', value: 'wp-content/themes/gym/images/icons/glyphicons_231_sun.png'},
								{text: '232 cloud', value: 'wp-content/themes/gym/images/icons/glyphicons_232_cloud.png'},
								{text: '233 direction', value: 'wp-content/themes/gym/images/icons/glyphicons_233_direction.png'},
								{text: '234 brush', value: 'wp-content/themes/gym/images/icons/glyphicons_234_brush.png'},
								{text: '235 pen', value: 'wp-content/themes/gym/images/icons/glyphicons_235_pen.png'},
								{text: '236 zoom in', value: 'wp-content/themes/gym/images/icons/glyphicons_236_zoom_in.png'},
								{text: '237 zoom out', value: 'wp-content/themes/gym/images/icons/glyphicons_237_zoom_out.png'},
								{text: '238 pin', value: 'wp-content/themes/gym/images/icons/glyphicons_238_pin.png'},
								{text: '239 albums', value: 'wp-content/themes/gym/images/icons/glyphicons_239_albums.png'},
								{text: '240 rotation lock', value: 'wp-content/themes/gym/images/icons/glyphicons_240_rotation_lock.png'},
								{text: '241 flash', value: 'wp-content/themes/gym/images/icons/glyphicons_241_flash.png'},
								{text: '242 google maps', value: 'wp-content/themes/gym/images/icons/glyphicons_242_google_maps.png'},
								{text: '243 anchor', value: 'wp-content/themes/gym/images/icons/glyphicons_243_anchor.png'},
								{text: '244 conversation', value: 'wp-content/themes/gym/images/icons/glyphicons_244_conversation.png'},
								{text: '245 chat', value: 'wp-content/themes/gym/images/icons/glyphicons_245_chat.png'},
								{text: '246 male', value: 'wp-content/themes/gym/images/icons/glyphicons_246_male.png'},
								{text: '247 female', value: 'wp-content/themes/gym/images/icons/glyphicons_247_female.png'},
								{text: '248 asterisk', value: 'wp-content/themes/gym/images/icons/glyphicons_248_asterisk.png'},
								{text: '249 divide', value: 'wp-content/themes/gym/images/icons/glyphicons_249_divide.png'},
								{text: '250 snorkel diving', value: 'wp-content/themes/gym/images/icons/glyphicons_250_snorkel_diving.png'},
								{text: '251 scuba diving', value: 'wp-content/themes/gym/images/icons/glyphicons_251_scuba_diving.png'},
								{text: '252 oxygen bottle', value: 'wp-content/themes/gym/images/icons/glyphicons_252_oxygen_bottle.png'},
								{text: '253 fins', value: 'wp-content/themes/gym/images/icons/glyphicons_253_fins.png'},
								{text: '254 fishes', value: 'wp-content/themes/gym/images/icons/glyphicons_254_fishes.png'},
								{text: '255 boat', value: 'wp-content/themes/gym/images/icons/glyphicons_255_boat.png'},
								{text: '256 delete', value: 'wp-content/themes/gym/images/icons/glyphicons_256_delete.png'},
								{text: '257 sheriffs star', value: 'wp-content/themes/gym/images/icons/glyphicons_257_sheriffs_star.png'},
								{text: '258 qrcode', value: 'wp-content/themes/gym/images/icons/glyphicons_258_qrcode.png'},
								{text: '259 barcode', value: 'wp-content/themes/gym/images/icons/glyphicons_259_barcode.png'},
								{text: '260 pool', value: 'wp-content/themes/gym/images/icons/glyphicons_260_pool.png'},
								{text: '261 buoy', value: 'wp-content/themes/gym/images/icons/glyphicons_261_buoy.png'},
								{text: '262 spade', value: 'wp-content/themes/gym/images/icons/glyphicons_262_spade.png'},
								{text: '263 bank', value: 'wp-content/themes/gym/images/icons/glyphicons_263_bank.png'},
								{text: '264 vcard', value: 'wp-content/themes/gym/images/icons/glyphicons_264_vcard.png'},
								{text: '265 electrical plug', value: 'wp-content/themes/gym/images/icons/glyphicons_265_electrical_plug.png'},
								{text: '266 flag', value: 'wp-content/themes/gym/images/icons/glyphicons_266_flag.png'},
								{text: '267 credit card', value: 'wp-content/themes/gym/images/icons/glyphicons_267_credit_card.png'},
								{text: '268 keyboard wireless', value: 'wp-content/themes/gym/images/icons/glyphicons_268_keyboard_wireless.png'},
								{text: '269 keyboard wired', value: 'wp-content/themes/gym/images/icons/glyphicons_269_keyboard_wired.png'},
								{text: '270 shield', value: 'wp-content/themes/gym/images/icons/glyphicons_270_shield.png'},
								{text: '271 ring', value: 'wp-content/themes/gym/images/icons/glyphicons_271_ring.png'},
								{text: '272 cake', value: 'wp-content/themes/gym/images/icons/glyphicons_272_cake.png'},
								{text: '273 drink', value: 'wp-content/themes/gym/images/icons/glyphicons_273_drink.png'},
								{text: '274 beer', value: 'wp-content/themes/gym/images/icons/glyphicons_274_beer.png'},
								{text: '275 fast food', value: 'wp-content/themes/gym/images/icons/glyphicons_275_fast_food.png'},
								{text: '276 cutlery', value: 'wp-content/themes/gym/images/icons/glyphicons_276_cutlery.png'},
								{text: '277 pizza', value: 'wp-content/themes/gym/images/icons/glyphicons_277_pizza.png'},
								{text: '278 birthday cake', value: 'wp-content/themes/gym/images/icons/glyphicons_278_birthday_cake.png'},
								{text: '279 tablet', value: 'wp-content/themes/gym/images/icons/glyphicons_279_tablet.png'},
								{text: '280 settings', value: 'wp-content/themes/gym/images/icons/glyphicons_280_settings.png'},
								{text: '281 bullets', value: 'wp-content/themes/gym/images/icons/glyphicons_281_bullets.png'},
								{text: '282 cardio', value: 'wp-content/themes/gym/images/icons/glyphicons_282_cardio.png'},
								{text: '283 t-shirt', value: 'wp-content/themes/gym/images/icons/glyphicons_283_t-shirt.png'},
								{text: '284 pants', value: 'wp-content/themes/gym/images/icons/glyphicons_284_pants.png'},
								{text: '285 sweater', value: 'wp-content/themes/gym/images/icons/glyphicons_285_sweater.png'},
								{text: '286 fabric', value: 'wp-content/themes/gym/images/icons/glyphicons_286_fabric.png'},
								{text: '287 leather', value: 'wp-content/themes/gym/images/icons/glyphicons_287_leather.png'},
								{text: '288 scissors', value: 'wp-content/themes/gym/images/icons/glyphicons_288_scissors.png'},
								{text: '289 bomb', value: 'wp-content/themes/gym/images/icons/glyphicons_289_bomb.png'},
								{text: '290 skull', value: 'wp-content/themes/gym/images/icons/glyphicons_290_skull.png'},
								{text: '291 celebration', value: 'wp-content/themes/gym/images/icons/glyphicons_291_celebration.png'},
								{text: '292 tea kettle', value: 'wp-content/themes/gym/images/icons/glyphicons_292_tea_kettle.png'},
								{text: '293 french press', value: 'wp-content/themes/gym/images/icons/glyphicons_293_french_press.png'},
								{text: '294 coffe cup', value: 'wp-content/themes/gym/images/icons/glyphicons_294_coffe_cup.png'},
								{text: '295 pot', value: 'wp-content/themes/gym/images/icons/glyphicons_295_pot.png'},
								{text: '296 grater', value: 'wp-content/themes/gym/images/icons/glyphicons_296_grater.png'},
								{text: '297 kettle', value: 'wp-content/themes/gym/images/icons/glyphicons_297_kettle.png'},
								{text: '298 hospital', value: 'wp-content/themes/gym/images/icons/glyphicons_298_hospital.png'},
								{text: '299 hospital h', value: 'wp-content/themes/gym/images/icons/glyphicons_299_hospital_h.png'},
								{text: '300 microphone', value: 'wp-content/themes/gym/images/icons/glyphicons_300_microphone.png'},
								{text: '301 webcam', value: 'wp-content/themes/gym/images/icons/glyphicons_301_webcam.png'},
								{text: '302 temple christianity church', value: 'wp-content/themes/gym/images/icons/glyphicons_302_temple_christianity_church.png'},
								{text: '303 temple islam', value: 'wp-content/themes/gym/images/icons/glyphicons_303_temple_islam.png'},
								{text: '304 temple hindu', value: 'wp-content/themes/gym/images/icons/glyphicons_304_temple_hindu.png'},
								{text: '305 temple buddhist', value: 'wp-content/themes/gym/images/icons/glyphicons_305_temple_buddhist.png'},
								{text: '306 bicycle', value: 'wp-content/themes/gym/images/icons/glyphicons_306_bicycle.png'},
								{text: '307 life preserver', value: 'wp-content/themes/gym/images/icons/glyphicons_307_life_preserver.png'},
								{text: '308 share alt', value: 'wp-content/themes/gym/images/icons/glyphicons_308_share_alt.png'},
								{text: '309 comments', value: 'wp-content/themes/gym/images/icons/glyphicons_309_comments.png'},
								{text: '310 flower', value: 'wp-content/themes/gym/images/icons/glyphicons_310_flower.png'},
								{text: '311 baseball', value: 'wp-content/themes/gym/images/icons/glyphicons_311_baseball.png'},
								{text: '312 rugby', value: 'wp-content/themes/gym/images/icons/glyphicons_312_rugby.png'},
								{text: '313 ax', value: 'wp-content/themes/gym/images/icons/glyphicons_313_ax.png'},
								{text: '314 table tennis', value: 'wp-content/themes/gym/images/icons/glyphicons_314_table_tennis.png'},
								{text: '315 bowling', value: 'wp-content/themes/gym/images/icons/glyphicons_315_bowling.png'},
								{text: '316 tree conifer', value: 'wp-content/themes/gym/images/icons/glyphicons_316_tree_conifer.png'},
								{text: '317 tree deciduous', value: 'wp-content/themes/gym/images/icons/glyphicons_317_tree_deciduous.png'},
								{text: '318 more items', value: 'wp-content/themes/gym/images/icons/glyphicons_318_more_items.png'},
								{text: '319 sort', value: 'wp-content/themes/gym/images/icons/glyphicons_319_sort.png'},
								{text: '320 filter', value: 'wp-content/themes/gym/images/icons/glyphicons_320_filter.png'},
								{text: '321 gamepad', value: 'wp-content/themes/gym/images/icons/glyphicons_321_gamepad.png'},
								{text: '322 playing dices', value: 'wp-content/themes/gym/images/icons/glyphicons_322_playing_dices.png'},
								{text: '323 calculator', value: 'wp-content/themes/gym/images/icons/glyphicons_323_calculator.png'},
								{text: '324 tie', value: 'wp-content/themes/gym/images/icons/glyphicons_324_tie.png'},
								{text: '325 wallet', value: 'wp-content/themes/gym/images/icons/glyphicons_325_wallet.png'},
								{text: '326 piano', value: 'wp-content/themes/gym/images/icons/glyphicons_326_piano.png'},
								{text: '327 sampler', value: 'wp-content/themes/gym/images/icons/glyphicons_327_sampler.png'},
								{text: '328 podium', value: 'wp-content/themes/gym/images/icons/glyphicons_328_podium.png'},
								{text: '329 soccer ball', value: 'wp-content/themes/gym/images/icons/glyphicons_329_soccer_ball.png'},
								{text: '330 blog', value: 'wp-content/themes/gym/images/icons/glyphicons_330_blog.png'},
								{text: '331 dashboard', value: 'wp-content/themes/gym/images/icons/glyphicons_331_dashboard.png'},
								{text: '332 certificate', value: 'wp-content/themes/gym/images/icons/glyphicons_332_certificate.png'},
								{text: '333 bell', value: 'wp-content/themes/gym/images/icons/glyphicons_333_bell.png'},
								{text: '334 candle', value: 'wp-content/themes/gym/images/icons/glyphicons_334_candle.png'},
								{text: '335 pushpin', value: 'wp-content/themes/gym/images/icons/glyphicons_335_pushpin.png'},
								{text: '336 iphone shake', value: 'wp-content/themes/gym/images/icons/glyphicons_336_iphone_shake.png'},
								{text: '337 pin flag', value: 'wp-content/themes/gym/images/icons/glyphicons_337_pin_flag.png'},
								{text: '338 turtle', value: 'wp-content/themes/gym/images/icons/glyphicons_338_turtle.png'},
								{text: '339 rabbit', value: 'wp-content/themes/gym/images/icons/glyphicons_339_rabbit.png'},
								{text: '340 globe', value: 'wp-content/themes/gym/images/icons/glyphicons_340_globe.png'},
								{text: '341 briefcase', value: 'wp-content/themes/gym/images/icons/glyphicons_341_briefcase.png'},
								{text: '342 hdd', value: 'wp-content/themes/gym/images/icons/glyphicons_342_hdd.png'},
								{text: '343 thumbs up', value: 'wp-content/themes/gym/images/icons/glyphicons_343_thumbs_up.png'},
								{text: '344 thumbs down', value: 'wp-content/themes/gym/images/icons/glyphicons_344_thumbs_down.png'},
								{text: '345 hand right', value: 'wp-content/themes/gym/images/icons/glyphicons_345_hand_right.png'},
								{text: '346 hand left', value: 'wp-content/themes/gym/images/icons/glyphicons_346_hand_left.png'},
								{text: '347 hand up', value: 'wp-content/themes/gym/images/icons/glyphicons_347_hand_up.png'},
								{text: '348 hand down', value: 'wp-content/themes/gym/images/icons/glyphicons_348_hand_down.png'},
								{text: '349 fullscreen', value: 'wp-content/themes/gym/images/icons/glyphicons_349_fullscreen.png'},
								{text: '350 shopping bag', value: 'wp-content/themes/gym/images/icons/glyphicons_350_shopping_bag.png'},
								{text: '351 book open', value: 'wp-content/themes/gym/images/icons/glyphicons_351_book_open.png'},
								{text: '352 nameplate', value: 'wp-content/themes/gym/images/icons/glyphicons_352_nameplate.png'},
								{text: '353 nameplate alt', value: 'wp-content/themes/gym/images/icons/glyphicons_353_nameplate_alt.png'},
								{text: '354 vases', value: 'wp-content/themes/gym/images/icons/glyphicons_354_vases.png'},
								{text: '355 bullhorn', value: 'wp-content/themes/gym/images/icons/glyphicons_355_bullhorn.png'},
								{text: '356 dumbbell', value: 'wp-content/themes/gym/images/icons/glyphicons_356_dumbbell.png'},
								{text: '357 suitcase', value: 'wp-content/themes/gym/images/icons/glyphicons_357_suitcase.png'},
								{text: '358 file import', value: 'wp-content/themes/gym/images/icons/glyphicons_358_file_import.png'},
								{text: '359 file export', value: 'wp-content/themes/gym/images/icons/glyphicons_359_file_export.png'},
								{text: '360 bug', value: 'wp-content/themes/gym/images/icons/glyphicons_360_bug.png'},
								{text: '361 crown', value: 'wp-content/themes/gym/images/icons/glyphicons_361_crown.png'},
								{text: '362 smoking', value: 'wp-content/themes/gym/images/icons/glyphicons_362_smoking.png'},
								{text: '363 cloud upload', value: 'wp-content/themes/gym/images/icons/glyphicons_363_cloud_upload.png'},
								{text: '364 cloud download', value: 'wp-content/themes/gym/images/icons/glyphicons_364_cloud_download.png'},
								{text: '365 restart', value: 'wp-content/themes/gym/images/icons/glyphicons_365_restart.png'},
								{text: '366 security camera', value: 'wp-content/themes/gym/images/icons/glyphicons_366_security_camera.png'},
								{text: '367 expand', value: 'wp-content/themes/gym/images/icons/glyphicons_367_expand.png'},
								{text: '368 collapse', value: 'wp-content/themes/gym/images/icons/glyphicons_368_collapse.png'},
								{text: '369 collapse top', value: 'wp-content/themes/gym/images/icons/glyphicons_369_collapse_top.png'},
								{text: '370 globe af', value: 'wp-content/themes/gym/images/icons/glyphicons_370_globe_af.png'},
								{text: '371 global', value: 'wp-content/themes/gym/images/icons/glyphicons_371_global.png'},
								{text: '372 spray', value: 'wp-content/themes/gym/images/icons/glyphicons_372_spray.png'},
								{text: '373 nails', value: 'wp-content/themes/gym/images/icons/glyphicons_373_nails.png'},
								{text: '374 claw hammer', value: 'wp-content/themes/gym/images/icons/glyphicons_374_claw_hammer.png'},
								{text: '375 classic hammer', value: 'wp-content/themes/gym/images/icons/glyphicons_375_classic_hammer.png'},
								{text: '376 hand saw', value: 'wp-content/themes/gym/images/icons/glyphicons_376_hand_saw.png'},
								{text: '377 riflescope', value: 'wp-content/themes/gym/images/icons/glyphicons_377_riflescope.png'},
								{text: '378 electrical socket eu', value: 'wp-content/themes/gym/images/icons/glyphicons_378_electrical_socket_eu.png'},
								{text: '379 electrical socket us', value: 'wp-content/themes/gym/images/icons/glyphicons_379_electrical_socket_us.png'},
								{text: '380 pinterest', value: 'wp-content/themes/gym/images/icons/glyphicons_380_pinterest.png'},
								{text: '381 dropbox', value: 'wp-content/themes/gym/images/icons/glyphicons_381_dropbox.png'},
								{text: '382 google plus', value: 'wp-content/themes/gym/images/icons/glyphicons_382_google_plus.png'},
								{text: '383 jolicloud', value: 'wp-content/themes/gym/images/icons/glyphicons_383_jolicloud.png'},
								{text: '384 yahoo', value: 'wp-content/themes/gym/images/icons/glyphicons_384_yahoo.png'},
								{text: '385 blogger', value: 'wp-content/themes/gym/images/icons/glyphicons_385_blogger.png'},
								{text: '386 picasa', value: 'wp-content/themes/gym/images/icons/glyphicons_386_picasa.png'},
								{text: '387 amazon', value: 'wp-content/themes/gym/images/icons/glyphicons_387_amazon.png'},
								{text: '388 tumblr', value: 'wp-content/themes/gym/images/icons/glyphicons_388_tumblr.png'},
								{text: '389 wordpress', value: 'wp-content/themes/gym/images/icons/glyphicons_389_wordpress.png'},
								{text: '390 instapaper', value: 'wp-content/themes/gym/images/icons/glyphicons_390_instapaper.png'},
								{text: '391 evernote', value: 'wp-content/themes/gym/images/icons/glyphicons_391_evernote.png'},
								{text: '392 xing', value: 'wp-content/themes/gym/images/icons/glyphicons_392_xing.png'},
								{text: '393 zootool', value: 'wp-content/themes/gym/images/icons/glyphicons_393_zootool.png'},
								{text: '394 dribbble', value: 'wp-content/themes/gym/images/icons/glyphicons_394_dribbble.png'},
								{text: '395 deviantart', value: 'wp-content/themes/gym/images/icons/glyphicons_395_deviantart.png'},
								{text: '396 read it later', value: 'wp-content/themes/gym/images/icons/glyphicons_396_read_it_later.png'},
								{text: '397 linked in', value: 'wp-content/themes/gym/images/icons/glyphicons_397_linked_in.png'},
								{text: '398 forrst', value: 'wp-content/themes/gym/images/icons/glyphicons_398_forrst.png'},
								{text: '399 pinboard', value: 'wp-content/themes/gym/images/icons/glyphicons_399_pinboard.png'},
								{text: '400 behance', value: 'wp-content/themes/gym/images/icons/glyphicons_400_behance.png'},
								{text: '401 github', value: 'wp-content/themes/gym/images/icons/glyphicons_401_github.png'},
								{text: '402 youtube', value: 'wp-content/themes/gym/images/icons/glyphicons_402_youtube.png'},
								{text: '403 skitch', value: 'wp-content/themes/gym/images/icons/glyphicons_403_skitch.png'},
								{text: '404 4square', value: 'wp-content/themes/gym/images/icons/glyphicons_404_4square.png'},
								{text: '405 quora', value: 'wp-content/themes/gym/images/icons/glyphicons_405_quora.png'},
								{text: '406 badoo', value: 'wp-content/themes/gym/images/icons/glyphicons_406_badoo.png'},
								{text: '407 spotify', value: 'wp-content/themes/gym/images/icons/glyphicons_407_spotify.png'},
								{text: '408 stumbleupon', value: 'wp-content/themes/gym/images/icons/glyphicons_408_stumbleupon.png'},
								{text: '409 readability', value: 'wp-content/themes/gym/images/icons/glyphicons_409_readability.png'},
								{text: '410 facebook', value: 'wp-content/themes/gym/images/icons/glyphicons_410_facebook.png'},
								{text: '411 twitter', value: 'wp-content/themes/gym/images/icons/glyphicons_411_twitter.png'},
								{text: '412 instagram', value: 'wp-content/themes/gym/images/icons/glyphicons_412_instagram.png'},
								{text: '413 posterous spaces', value: 'wp-content/themes/gym/images/icons/glyphicons_413_posterous_spaces.png'},
								{text: '414 vimeo', value: 'wp-content/themes/gym/images/icons/glyphicons_414_vimeo.png'},
								{text: '415 flickr', value: 'wp-content/themes/gym/images/icons/glyphicons_415_flickr.png'},
								{text: '416 last fm', value: 'wp-content/themes/gym/images/icons/glyphicons_416_last_fm.png'},
								{text: '417 rss', value: 'wp-content/themes/gym/images/icons/glyphicons_417_rss.png'},
								{text: '418 skype', value: 'wp-content/themes/gym/images/icons/glyphicons_418_skype.png'},
								{text: '419 e-mail', value: 'wp-content/themes/gym/images/icons/glyphicons_419_e-mail.png'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_icons icons="' + e.data.icon + '"]' );
						}
					});
					}
				},
				{
					text: 'Team member',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Team member',
						body: [{
							type: 'textbox',
							name: 'name',
							label: 'Name',
							value: 'Arnold Schwarzenegger'
						},
						{
							type: 'textbox',
							name: 'position',
							label: 'Position',
							value: 'Trainer'
						},
						{
							type: 'textbox',
							name: 'imgsrc',
							label: 'Image Member',
							value: ''
						},
						{
							type: 'textbox',
							name: 'about',
							label: 'About',
							value: 'Seded ut perspiciatis unde omnis iste natus error sit...'
						},
						{
							type: 'listbox', 
							name: 'columns', 
							label: 'Number of columns', 
							'values': [
								{text: '2', value: '2'},
								{text: '3', value: '3'},
								{text: '4', value: '4'}
							]
						},
						{
							type: 'textbox',
							name: 'social',
							label: 'Social Networks',
							value: 'Twitter, http://twitter.com/username, Facebook, http://facebook.com/username'
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_team_member member_name="' + e.data.name + '" member_position="' + e.data.position + '" member_img_src="' + e.data.imgsrc + '" member_social_list="' + e.data.social + '" member_columns="' + e.data.columns + '"]' + e.data.about + '[/gym_team_member]' );
						}
					});
					}
				},
				{
					text: 'Pricing',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Pricing',
						body: [{
							type: 'textbox',
							name: 'pricename',
							label: 'Price name',
							value: 'Standard'
						},
						{
							type: 'textbox',
							name: 'value',
							label: 'Value',
							value: '30'
						},
						{
							type: 'listbox', 
							name: 'localcurrency', 
							label: 'Local currency', 
							'values': [
								{text: '$', value: '$'},
								{text: '€', value: '€'},
								{text: 'R$', value: 'R$'},
								{text: '£', value: '£'}
							]
						},
						{
							type: 'textbox',
							name: 'about',
							label: 'About',
							value: 'Billed annually or $10 month-to-month.'
						},
						{
							type: 'listbox', 
							name: 'columns', 
							label: 'Number of columns', 
							'values': [
								{text: '2', value: '2'},
								{text: '3', value: '3'},
								{text: '4', value: '4'}
							]
						},
						{
							type: 'textbox',
							name: 'advantages',
							label: 'Advantages',
							value: 'With over $10, choose a martial art.'
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_pricing pricing_name="' + e.data.pricename + '" pricing_value="' + e.data.value + '" pricing_local_currency="' + e.data.localcurrency + '" pricing_text="' + e.data.about + '" pricing_columns="' + e.data.columns + '" pricing_advantages="' + e.data.advantages + '"]' + '[/gym_pricing]' );
						}
					});
					}
				},
				{
					text: 'Gallery',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Gallery',
						body: [{
							type: 'textbox',
							name: 'title',
							label: 'Title',
							value: 'Recent gallery'
						},

						{
							type: 'textbox',
							name: 'numberitems',
							label: 'No of items to show',
							value: '-1'
						},
						{
							type: 'textbox',
							name: 'galleryid',
							label: 'Gallery category ID',
							value: '18'
						},
						{
							type: 'listbox', 
							name: 'filter', 
							label: 'Show filters', 
							'values': [
								{text: 'Yes', value: 'yes'},
								{text: 'No', value: 'no'}
							]
						},
						{
							type: 'listbox', 
							name: 'columns', 
							label: 'Number of columns', 
							'values': [
								{text: '2', value: '2'},
								{text: '3', value: '3'},
								{text: '4', value: '4'}
							]
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_gallery title="' + e.data.title + '" cat_id="' + e.data.galleryid + '" no="' + e.data.numberitems + '" show_filters="' + e.data.filter + '" columns="' + e.data.columns + '"]' );
						}
					});
					}
				},
				{
					text: 'Grid',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Grid',
						body: [{
							type: 'listbox', 
							name: 'columns', 
							label: 'Number of columns', 
							'values': [
								{text: '3', value: '3'},
								{text: '4', value: '4'},
								{text: '5', value: '5'},
								{text: '6', value: '6'}
							]
						},
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_grid grid_columns="' + e.data.columns + '"]insert images here[/gym_grid]' );
						}
					});
					}
				},
				{
					text: 'Title and subtitle',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Title and subtitle',
						body: [{
							type: 'textbox',
							name: 'title',
							label: 'Title',
							value: 'Title'
						},
						{
							type: 'textbox',
							name: 'subtitle',
							label: 'Subtitle',
							value: 'Subtitle'
						},
						{
							type: 'listbox', 
							name: 'align', 
							label: 'Align', 
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Right', value: 'right'},
								{text: 'Center', value: 'center'}
							]
						},
						{
							type: 'listbox', 
							name: 'color', 
							label: 'Color Scheme', 
							'values': [
								{text: 'Normal', value: 'normal'},
								{text: 'Light', value: 'light'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_title_subtitle title="' + e.data.title + '" subtitle="' + e.data.subtitle + '" align="' + e.data.align + '" color="' + e.data.color + '"]' );
						}
					});
					}
				},
				{
					text: 'Highlights',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Highlighted text',
						body: [{
							type: 'textbox',
							name: 'text',
							label: 'Text',
							value: 'Dummy text'
						},
						{
							type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Theme color', value: 'highlight1'},
								{text: 'Grey', value: 'highlight2'},
								{text: 'Dotted', value: 'highlight3'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_highlight style="' + e.data.style + '"]' + e.data.text + '[/gym_highlight]'  );
						}
					});
					}
				},
				{
					text: 'Dropcaps',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Dropcap',
						body: [{
							type: 'textbox',
							name: 'letter',
							label: 'Letter',
							value: 'A'
						},
						{
							type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Big letter', value: 'dropcap1'},
								{text: 'Inverse in square', value: 'dropcap2'},
								{text: 'Inverse in circle', value: 'dropcap3'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_dropcaps style="' + e.data.style + '"]' + e.data.letter + '[/gym_dropcaps]'  );
						}
					});
					}
				},
				{
					text: 'Blockquotes',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Blockquote',
						body: [{
							type: 'textbox',
							name: 'text',
							label: 'Text',
							value: 'Dummy text'
						},
						{
							type: 'listbox', 
							name: 'align', 
							label: 'Align', 
							'values': [
								{text: 'Left', value: ''},
								{text: 'Right', value: 'right'}
							]
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_blockquote align="' + e.data.align + '"]' + e.data.text + '[/gym_blockquote]'  );
						}
					});
					}
				},
				{
					text: 'Fullwidth container',
					onclick: function() {
					editor.windowManager.open( {
						title: 'Fullwidth container',
						body: [{
							type: 'textbox',
							name: 'backgroundurl',
							label: 'IMG or Pattern SRC',
							value: 'url'
						},
						{
							type: 'listbox', 
							name: 'backgroundcustom', 
							label: 'Custom Background Repeat', 
							'values': [
								{text: 'No repeat', value: 'no-repeat'},
								{text: 'Repeat horizontally', value: 'repeat-y'},
								{text: 'Repeat Vertically', value: 'repeat-x'},
								{text: 'Repeat', value: 'repeat'}
							]
						},
						{
							type: 'listbox', 
							name: 'backgroundposition', 
							label: 'Background position', 
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Right', value: 'right'},
								{text: 'Center', value: 'center'}
							]
						},
						{
							type: 'textbox',
							name: 'coloroverlay',
							label: 'Color Overlay',
							value: '#57CA8E'
						},
						{
							type: 'listbox', 
							name: 'colorscheme', 
							label: 'Color Scheme', 
							'values': [
								{text: 'Normal', value: 'normal'},
								{text: 'Light', value: 'light'}
							]
						},
						{
							type: 'textbox',
							name: 'padding',
							label: 'Padding Height & Bottom',
							value: '20px'
						},
						{
							type: 'textbox',
							name: 'bordertop',
							label: 'Border Top',
							value: '#e5e5e5'
						}
						],
						onsubmit: function( e ) {
							editor.insertContent( '[gym_fullwidth_container fullwidth_container_img_src="' + e.data.backgroundurl + '" fullwidth_container_img_position="' + e.data.backgroundcustom + '" fullwidth_container_img_local="' + e.data.backgroundposition + '" fullwidth_container_color_overlay="' + e.data.coloroverlay + '" fullwidth_container_color_scheme="' + e.data.colorscheme + '" fullwidth_container_padding="' + e.data.padding + '" fullwidth_container_border="' + e.data.bordertop + '"]' + 'Delete this text and insert the content[/gym_fullwidth_container]'  );
						}
					});
					}
				}
           ]
        });
    });
})();