$(function(){
$("#elastic_grid_demo").elastic_grid({	
	'hoverDirection': true,
	'hoverDelay': 0,
	'hoverInverse': false,
	'expandingSpeed': 500,
	'expandingHeight': 500,
	'items' :
		[
		/*	{
			'title' : 'Gallery 1',
			'description'   : 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.',
			'thumbnail' : ['img/portfolio/small/1.jpg', 'img/portfolio/small/2.jpg', 'img/portfolio/small/3.jpg', 'img/portfolio/small/4.jpg', 'img/portfolio/small/11.jpg'],
			'large' : ['img/portfolio/large/1.jpg', 'img/portfolio/large/2.jpg', 'img/portfolio/large/3.jpg', 'img/portfolio/large/4.jpg', 'img/portfolio/large/11.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['All']
			},	*/

			{
			'title' : 'WashDude',
			'description'   : 'WashDude is a online laundry service provider with awesome services and affordable price, but available only at Bhubaneswar region.',
			'thumbnail' : ['img/portfolio/works/wd-small1.jpg', 'img/portfolio/works/wd-small2.jpg', 'img/portfolio/works/wd-small3.png', 'img/portfolio/works/wd-small4.png'],
			'large' : ['img/portfolio/works/wd-large1.jpg', 'img/portfolio/works/wd-large2.jpg', 'img/portfolio/works/wd-large3.jpg', 'img/portfolio/works/wd-large4.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['Web','All']
			},
			
			{
			'title' : 'My Kid',
			'description'   : 'Its a infomation based app for school going students. This app gives information on Home works, Routines, Results, Remarks, Events of a student.',
			'thumbnail' : ['img/portfolio/works/mykid-small1.png', 'img/portfolio/works/mykid-small2.png', 'img/portfolio/works/mykid-small3.png', 'img/portfolio/works/mykid-small4.png'],
			'large' : ['img/portfolio/works/mykid-large1.png', 'img/portfolio/works/mykid-large2.png', 'img/portfolio/works/mykid-large3.png', 'img/portfolio/works/mykid-large4.png'],
			'button_list'   :
			[
			],
			'tags'  : ['Mobile App']
			},	

			{
			'title' : 'FoodKnox',
			'description'   : '',
			'thumbnail' : ['img/portfolio/works/fk-small1.png', 'img/portfolio/works/fk-small2.png', 'img/portfolio/works/fk-small3.png', 'img/portfolio/works/fk-small4.png'],
			'large' : ['img/portfolio/works/fk-large1.png', 'img/portfolio/works/fk-large2.png', 'img/portfolio/works/fk-large3.png', 'img/portfolio/works/fk-large4.png'],
			'button_list'   :
			[
			],
			'tags'  : ['Mobile App', 'All']
			},			
			

			{
			'title' : 'Marvel',
			'description'   : 'It deals with stock maintainance and billing.',
			'thumbnail' : ['img/portfolio/works/marvel-small4.png', 'img/portfolio/works/marvel-small2.png', 'img/portfolio/works/marvel-small3.png', 'img/portfolio/works/marvel-small1.png'],
			'large' : ['img/portfolio/works/marvel-large4.png', 'img/portfolio/works/marvel-large2.png', 'img/portfolio/works/marvel-large3.png', 'img/portfolio/works/marvel-large1.png'],
			'button_list'   :
			[
			],
			'tags'  : ['ERP','All']
			},

			{
			'title' : 'Super Dhobi',
			'description'   : 'Superdhobi is committed to deliver quality laundry services at your convenience. Its state-of-the-art equipments combined with professional handling techniques replenishes the life of your garments, making them as fresh as brand new.',
			'thumbnail' : ['img/portfolio/works/graphics-dhobixs.jpg'],
			'large' : ['img/portfolio/works/graphics-dhobimd.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['Graphics','All']
			},

			{
			'title' : 'LazerySleep',
			'description'   : 'Lazery Sleep is serving the US and Canada featuring the best mattresses with the latest technology. We at The Lazery Sleep Company have spent a lot of time and effort to design the most comfortable and durable coil beam technology in the market, to offer you a peaceful night sleep.',
			'thumbnail' : ['img/portfolio/works/ls-small1.jpg', 'img/portfolio/works/ls-small2.jpg', 'img/portfolio/works/ls-small3.jpg', 'img/portfolio/works/ls-small4.jpg'],
			'large' : ['img/portfolio/works/ls-large.jpg', 'img/portfolio/works/ls-large2.jpg', 'img/portfolio/works/ls-large3.jpg', 'img/portfolio/works/ls-large4.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['Web']
			},

			{
			'title' : 'Speed Info',
			'description'   : '',
			'thumbnail' : ['img/portfolio/works/spdinf-small1.PNG', 'img/portfolio/works/spdinf-small2.png', 'img/portfolio/works/spdinf-small3.png', 'img/portfolio/works/spdinf-small4.png'],
			'large' : ['img/portfolio/works/spdinf-large1.png', 'img/portfolio/works/spdinf-large2.png', 'img/portfolio/works/spdinf-large3.png', 'img/portfolio/works/spdinf-large4.png'],
			'button_list'   :
			[
			],
			'tags'  : ['ERP']
			},		
				

			{
			'title' : 'PC Info Solution',
			'description'   : '',
			'thumbnail' : ['img/portfolio/works/graphics-pcxs.jpg'],
			'large' : ['img/portfolio/works/graphics-pcmd.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['Graphics']
			},

			{
			'title' : 'Super Dhobi',
			'description'   : 'Superdhobi is committed to deliver quality laundry services at your convenience. Its state-of-the-art equipments combined with professional handling techniques replenishes the life of your garments, making them as fresh as brand new.',
			'thumbnail' : ['img/portfolio/works/ma-dhobis1.PNG', 'img/portfolio/works/ma-dhobis2.png', 'img/portfolio/works/ma-dhobis3.png', 'img/portfolio/works/ma-dhobis4.png'],
			'large' : ['img/portfolio/works/ma-dhobil1.png', 'img/portfolio/works/ma-dhobil2.png', 'img/portfolio/works/ma-dhobil3.png', 'img/portfolio/works/ma-dhobil4.png'],
			'button_list'   :
			[
			],
			'tags'  : ['Mobile App']
			},

			{
			'title' : 'Super Dhobi',
			'description'   : 'Superdhobi is committed to deliver quality laundry services at your convenience. Its state-of-the-art equipments combined with professional handling techniques replenishes the life of your garments, making them as fresh as brand new.',
			'thumbnail' : ['img/portfolio/works/dhobi-small1.jpg', 'img/portfolio/works/dhobi-small2.jpg', 'img/portfolio/works/dhobi-small3.jpg', 'img/portfolio/works/dhobi-small4.jpg'],
			'large' : ['img/portfolio/works/dhobi-large1.jpg', 'img/portfolio/works/dhobi-large2.jpg', 'img/portfolio/works/dhobi-large3.jpg', 'img/portfolio/works/dhobi-large4.jpg'],
			'button_list'   :
			[
			],
			'tags'  : ['Web']
			},	
				 
	 
		]
	});
});