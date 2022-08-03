export const add = async e => {
	e.preventDefault()

	const userAdd = new FormData( $addForm )
	const userData = [
		userAdd.get('name'),
		userAdd.get('phone_number'),
		userAdd.get('email')
	]

	let formOk = true
	for ( let i = 0; i < 2; i++ ) {
		if ( userData[i] == '' ) {
			formOk = false
			break
		}
	}

	if ( formOk ) {
		for ( let i = 0; i < 3; i++ )
			$addForm[i].blur()

		const res = await fetch( 'php/add.php', {
			method: 'POST',
			body: userAdd
		} )

		const id = await res.text()
		if ( id ) {
			for ( let i = 0; i < 3; i++ )
				$addForm[i].value = ''

			const $contact = document.createElement('div')

			userData.forEach( data => {
				const $p = document.createElement('p')

				if ( !data )
					$p.className = 'empty'

				$p.innerHTML = data
				$contact.appendChild( $p )
			} )

			$contact.contact_id = id
			$contacts.appendChild( $contact )
		}
	}
}