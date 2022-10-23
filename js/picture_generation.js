/*
<div class="wrapper_favorite_picture">
    <div id="favorite_4">
        <img src="../img/favorite_4.jpg">
        <div class="wrapper_glass">
            <h4 class="glass_text">
                VRUBEL
            </h4>
            <h3 class="glass_text">
                ROSES IN SKY
            </h3>
            <h4 class="glass_text">
                1957
            </h4>
        </div>
    </div>
</div>
*/

function initWrapper(wrapper_id, autor, name, desc, max_height, path) {
	const wrapper 			= document.getElementById(wrapper_id);
	const section_picture 	= document.createElement('div');
	const wrapper_picture 	= document.createElement('div');
	const picture 			= initPicture(max_height, path);
	const wrapper_glass 	= document.createElement('div');
	const wrapper_autor 	= document.createElement('h4');
	const wrapper_name 		= document.createElement('h3');
	const wrapper_desc 		= document.createElement('h4');
	
	// ----------------------------------------------
	
	section_picture.className 	 = 'wrapper_favorite_picture';
	wrapper_picture.id 			 = autor + '_' + name;
	wrapper_glass.className		 = 'wrapper_glass';
	wrapper_autor.className = wrapper_name.className = wrapper_desc.className = 'glass_text';
	
	// ----------------------------------------------
	
	wrapper_autor.innerHTML = autor;
	wrapper_name.innerHTML 	= name;
	wrapper_desc.innerHTML 	= desc;
	
	// ----------------------------------------------
	
	wrapper_glass.appendChild(wrapper_autor);
	wrapper_glass.appendChild(wrapper_name);
	wrapper_glass.appendChild(wrapper_desc);
	wrapper_picture.appendChild(picture);
	wrapper_picture.appendChild(wrapper_glass);
	section_picture.appendChild(wrapper_picture);
	wrapper.appendChild(section_picture);
	
	return picture;
}

function initPicture(max_height, path) {
	const picture = document.createElement('img');
	
	picture.src = path;
	picture.style.height = max_height + 'px';
	
	return picture;
}

function initShadow(wrapper, position) {
	const shadow_color = 'rgba(0, 0, 0, 0.3)';
	const shadow_dim = '20px';
	let shadow_x = '10px';
	let shadow_y = '15px';
	
	switch (position) {
		case 'right-bott': 
			break;
		case 'right-top': 
			shadow_y = '-' + shadow_y;
			break;
		case 'left-bott': 
			shadow_x = '-' + shadow_x;
			break;
		case 'left-top': 
			shadow_x = '-' + shadow_x;
			shadow_y = '-' + shadow_y;
			break;
	}
	
	wrapper.style.boxShadow = (shadow_x + ' '+ shadow_y + ' '+ shadow_dim + ' ' + shadow_color);
}

function detectQuadrant(wrapper, wrapper_pic) {
	const wrapper_bounds = wrapper.getBoundingClientRect();
	const pic_bounds = wrapper_pic.getBoundingClientRect();
	const centerX = pic_bounds.left;
	const centerY = pic_bounds.top;
	
		
	if ((wrapper_bounds.width / 2) > centerX && (wrapper_bounds.top + 100) > centerY) {
		return 'left-top';
	} else if ((wrapper_bounds.width / 2) > centerX && (wrapper_bounds.top + 100) < centerY) {
		return 'left-bott';
	} else if ((wrapper_bounds.width / 2) < centerX && (wrapper_bounds.top + 100) > centerY) {
		return'right-top';
	} else if ((wrapper_bounds.width / 2) < centerX && (wrapper_bounds.top + 100) < centerY) {
		return 'right-bott';
	}
}