class DeleteContact {
	constructor() {
		const $button = document.createElement('button')
		$button.innerHTML = 'Delete'
		this.$delete = document.createElement('div')
		this.$delete.id = '$delete'
		this.$delete.appendChild( $button )
		this.$delete.childNodes[0].onclick = this.deleteContacts

		this.contacts_delete = []
	}




	deleteContacts = async e => {
		const c_d = this.contacts_delete
		let ids = `${ c_d[0].contact_id }`
		for ( let i = 1; i < c_d.length; i++ )
			ids += `,${ c_d[i].contact_id }`

		const form = new FormData
		form.append( 'ids', ids )

		const res = await fetch( 'php/delete.php', {
			method: 'POST',
			body: form
		} )

		const txt = await res.text()

		if ( txt == 'delete ok' )
			this.showDelete()
	}




	showDelete() {
		this.contacts_delete.forEach( $contact => {
			$contact.className = 'disappear'
		} )

		setTimeout( () => {
			this.contacts_delete.forEach( $contact => {
				$contacts.removeChild( $contact )
			} )

			this.contacts_delete = []
			document.body.removeChild( this.$delete )
		}, 297 )
	}




	showOption = e => {
		//showCustomMenu()

		const element = e.target
		let parent = element.parentNode
		let contact_id = false

		if ( element.contact_id ) {
			parent = element
			contact_id = true
		} else if ( parent.contact_id )
			contact_id = true

		if ( contact_id && parent.className != 'update' ) {
			if ( parent.className == 'contactDelete' )
				this.removeItem( parent )
			else
				this.addItem( parent )

			document.body.appendChild( this.$delete )

			if ( !this.contacts_delete.length )
				document.body.removeChild( this.$delete )
		}

		return false;
	}


	removeItem( item ) {
		item.className = ''
		const i = this.contacts_delete.indexOf( item )
		this.contacts_delete.splice( i, 1 )
	}

	addItem( item ) {
		item.className = 'contactDelete'
		this.contacts_delete.push( item )
	}
}




export { DeleteContact }