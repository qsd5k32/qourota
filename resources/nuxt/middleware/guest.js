export default function ({ store, redirect }) {
  // If the user is authenticated
  if(store.$auth.loggedIn)
  {
    redirect('/');
  }
}
