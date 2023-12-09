# Secured-app
Developed a web application with security measures in place to protect against OWASP vulnerabilities.

The application is protected from these vulnerabilities:

## Broken Access Control

login system in the application. Also, an **admin page** that is restricted from the normal users.
The inputs prevented from **path traversal attacks** as well (in case they’re prone to the attack).

## Cryptographic Failures

Any sensitive data that is being sent to the server encrypted using
**strong cryptographic encryptions**. Keys **hidden** from the source
code (hard to apply cryptanalysis for the attacker).

## Injection

Any data retrieval parameters protected from both **SQL** and **XSS** injections.

## Insecure Design

**Limit false login attempts** for each session. If a user tries to enter a wrong
password for more than 3 times or more in 1 minute, they restricted
from submitting any more requests for 10 minutes.

## Security Misconfiguration

Add an insert image facility that accepts only **image extensions. Size limitation**.

## Identification and Authentication Failures

Perform a **two-factor authentication** for the login system available on the
application. This is applied to ensure that the person who’s trying to access the
account is the one who’s they’re claiming to be. **Passwords should be hashed in the DB**.
