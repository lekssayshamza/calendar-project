@extends('layouts.app')

@section('content')
<div 
  style="
    max-width: 720px; 
    margin: 40px auto; 
    font-family: Arial, sans-serif; 
    color: #1a202c; /* dark gray */
    background: #f9fafb; 
    padding: 30px 40px; 
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    opacity: 0;
    transform: translateX(-50px);
    animation: slideIn 0.6s forwards ease-out;
  "
>
  <h1 style="font-size: 2rem; font-weight: 700; margin-bottom: 24px;">FAQ & Help</h1>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: How do I create an event?</h3>
  <p style="margin-top: 8px;">Go to the Calendar page and click the "Create Event" button. Fill in the details and save.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: How can I view other users' calendars?</h3>
  <p style="margin-top: 8px;">Use the "Users Calendar" page from the navigation bar, then search for the user by name or email.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: Will I get reminders for upcoming events?</h3>
  <p style="margin-top: 8px;">Yes! If you set up an email reminder, you'll receive notifications before your event starts.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: Who do I contact for support?</h3>
  <p style="margin-top: 8px;">Please email support@example.com or contact the admin via the dashboard.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: How do I reset my password?</h3>
  <p style="margin-top: 8px;">You can reset your password by clicking the "Forgot Password" link on the login page and following the instructions.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: Can I change my email address?</h3>
  <p style="margin-top: 8px;">Yes, you can update your email address from your profile settings in the dashboard.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: Where can I find the user guide?</h3>
  <p style="margin-top: 8px;">The user guide is available under the "Help" section accessible from the main menu.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: Is there a mobile app available?</h3>
  <p style="margin-top: 8px;">Currently, we do not have a mobile app, but our website is fully responsive and works well on mobile devices.</p>

  <h3 style="font-size: 1.25rem; font-weight: 600; margin-top: 24px;">Q: How do I report a bug or issue?</h3>
  <p style="margin-top: 8px;">Please report any bugs or issues by emailing bugs@example.com or using the feedback form in your profile.</p>
</div>

<style>
@keyframes slideIn {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>

@endsection
