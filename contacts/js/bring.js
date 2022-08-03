class Bring {
	constructor() {
		this.contruct()
	}

	async contruct() {
		await this.bring( 0, 3 )
		this.showContacts()
	}




	async bring( start, quantity ) {
		const data = new FormData()
		data.append( 'start', start )
		data.append( 'quantity', quantity )

		const res = await fetch( 'php/bring.php', {
			method: 'POST',
			body: data
		} )

		this.contacts = await res.json()
	}




	showContacts() {
		const keys = ['name', 'phone_number', 'email']

		this.contacts.forEach( contact => {
			const $contact = document.createElement('div')

			keys.forEach( key => {
				const $p = document.createElement('p')

				if ( !contact[key] )
					$p.className = 'empty'

				$p.innerHTML = contact[key]
				$contact.appendChild( $p )
			} )

			$contact.contact_id = contact['id']
			$contacts.appendChild( $contact )
		} )
	}
}




export { Bring }