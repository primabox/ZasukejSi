# Agents guidelines

- If an agent needs to run CLI commands to make the project work (clear caches, rebuild views, run migrations, install packages, build assets, etc.), the agent must execute those commands directly in the repository workspace.

Examples (non-exhaustive):

- `php artisan view:clear`
- `php artisan cache:clear`
- `php artisan config:clear`
- `composer install`
- `npm install` / `npm run build`

Run commands in the project root and verify they completed successfully. If a command requires interactive input or secrets, prompt the user before proceeding.

The agent is responsible for executing necessary maintenance commands — do not leave them as unexecuted instructions.
