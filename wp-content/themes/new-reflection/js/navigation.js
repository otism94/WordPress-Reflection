/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	const burgerButton = document.querySelector( '.hamburger' );
	const searchButtons = document.getElementById( 'search-buttons' );
	const searchBar = document.getElementById( 'nav-search' );
	const showSearchButton = document.querySelector( '.fa-search-plus' );
	const hideSearchButton = document.querySelector( '.fa-search-minus' );

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );
		burgerButton.classList.toggle( 'is-active' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			siteNavigation.scrollIntoView();
		}

		if ( siteNavigation.classList.contains( 'toggled' ) && searchBar.classList.contains( 'toggled' ) ) {
			searchBar.classList.toggle( 'toggled' );
			searchButtons.setAttribute( 'aria-expanded', 'false' );
			hideSearchButton.classList.remove( 'search-button-visible' );
			hideSearchButton.setAttribute( 'aria-hidden', 'true' );
			showSearchButton.classList.add( 'search-button-visible' );
			showSearchButton.setAttribute( 'aria-hidden', 'false' );
		}
	} );

	const navMenu = document.getElementById( 'primary-menu' );

	// Toggle the searchbar.
	console.log('Clicked the searchbar');
	searchButtons.addEventListener( 'click', function() {
		if ( siteNavigation.classList.contains( 'toggled' ) ) {
			siteNavigation.classList.toggle( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}

		let buttonToHide;
		let buttonToShow;

		for ( let i = 0; i < searchButtons.childNodes.length; i++ ) {
			const thisNode = searchButtons.childNodes[i];
			if ( thisNode.classList ) {
				if ( thisNode.classList.contains( 'search-button-visible' ) ) {
					buttonToHide = thisNode;
				} else if ( thisNode.classList.contains( 'fas' ) ) {
					buttonToShow = thisNode;
				}
			}
		}

		burgerButton.classList.remove( 'is-active' );
		buttonToHide.classList.remove( 'search-button-visible' );
		buttonToHide.setAttribute( 'aria-hidden', 'true' );
		buttonToShow.classList.add( 'search-button-visible' );
		buttonToShow.setAttribute( 'aria-hidden', 'false' );

		if ( buttonToHide == showSearchButton ) {
			searchButtons.setAttribute( 'aria-expanded', 'true' );
			searchBar.classList.toggle( 'toggled' );

			if ( window.innerWidth > 599 && !navMenu.classList.contains( 'off' ) ) {
				navMenu.classList.toggle( 'off' );
				button.setAttribute( 'aria-expanded', 'false' );
			}
		} else if ( buttonToHide == hideSearchButton ) {
			searchButtons.setAttribute( 'aria-expanded', 'false' );
			searchBar.classList.toggle( 'toggled' );

			if ( window.innerWidth > 599 && navMenu.classList.contains( 'off' ) ) {
				navMenu.classList.toggle( 'off' );
				button.setAttribute( 'aria-expanded', 'true' );
			}
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside && window.innerWidth <= 599 ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
			searchBar.classList.remove( 'toggled' );
			searchButtons.setAttribute( 'aria-expanded', 'false' );
			hideSearchButton.classList.remove( 'search-button-visible' );
			hideSearchButton.setAttribute( 'aria-hidden', 'true' );
			showSearchButton.classList.add( 'search-button-visible' );
			showSearchButton.setAttribute( 'aria-hidden', 'false' );

			if ( showSearchButton.classList.contains( 'search-button-visible' ) ) {
				showSearchButton.classList.add( 'search-button-visible' );
			}

			if ( burgerButton.classList.contains( 'is-active' ) ) {
				burgerButton.classList.toggle( 'is-active' );
			}
		}
	} );

	window.addEventListener( 'resize', function() {
		if ( window.innerWidth > 599 ) {
			burgerButton.classList.remove( 'is-active' );
		}

		if ( window.innerWidth > 599 && siteNavigation.classList.contains( 'toggled' ) ) {
			siteNavigation.classList.toggle( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}

		if ( window.innerWidth <= 599 && navMenu.classList.contains( 'toggle' ) ) {
			siteNavigation.classList.toggle( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// // Toggle focus each time a menu link is focused or blurred.
	// for ( const link of links ) {
	// 	link.addEventListener( 'focus', toggleFocus, true );
	// 	link.addEventListener( 'blur', toggleFocus, true );
	// }

	// // Toggle focus each time a menu link with children receive a touch event.
	// for ( const link of linksWithChildren ) {
	// 	link.addEventListener( 'touchstart', toggleFocus, false );
	// }

	// Toggle focus each time a menu link is focused or blurred (IE fix).
	for ( let i = 0; i < links.length; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event (IE fix).
	for ( let i = 0; i < linksWithChildren.length; i++ ) {
		linksWithChildren[i].addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			// for ( const link of menuItem.parentNode.children ) {
			// 	if ( menuItem !== link ) {
			// 		link.classList.remove( 'focus' );
			// 	}
			// }
			const menuItemSiblings = menuItem.parentNode.children;
			for ( let i = 0; i < menuItemSiblings.length; i++ ) {
				if ( menuItem !== link ) {
					menuItemSiblings[i].classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}

	window.addEventListener('load', function() {
		document.querySelector('.search-button-visible').setAttribute('aria-hidden', 'false');
	});
}() );