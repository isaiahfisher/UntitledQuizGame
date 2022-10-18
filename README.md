# UPDATING THE CODEBASE ON SERVER (TEMPORARY BEFORE CI/CD)

## SSH INTO SERVER
- ssh into the server using your provided credentials
- navigate to `/var/www/html`

## FETCH CHANGES FROM MASTER
- ensure you are on the master branch via running `sudo -u www-data git status`
- run git pull via `sudo -u www-data git pull`

## DEPLOY NEW CHANGES
- run `sudo -u www-data npm run build`

### CONGRATS YOU HAVE DEPLOYED THE MOST RECENT CHANGES
