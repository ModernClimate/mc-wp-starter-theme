#!/bin/bash

# Change to the directory where the script is located
cd "$(dirname "$0")"

# Ask the user for input
read -p "1. Name: " moduleName
read -p "2. Type (module/partial, default is module): " moduleType
moduleType=${moduleType:-module}
read -p "3. Generate SCSS file (true/false, default is true): " generateScss
generateScss=${generateScss:-true}
read -p "4. Generate JavaScript file (true/false, default is false): " generateJs
generateJs=${generateJs:-false}
read -p "5. Namespace project identifier (required): " namespace
read -p "6. SCSS Path (absolute path, default is /assets/styles/components/modules/): " scssPath
scssPath=${scssPath:-/assets/styles/components/modules/}
read -p "7. JavaScript Path (absolute path, default is /assets/theme/): " jsPath
jsPath=${jsPath:-/assets/theme/}

# Validate that namespace is not empty
if [ -z "$namespace" ]; then
    echo "Namespace project identifier is required."
    exit 1
fi

# Convert module name to PascalCase (removing spaces)
modulePascalCase=$(echo "$moduleName" | sed -E 's/[^a-zA-Z0-9]+/ /g' | awk '{for(i=1;i<=NF;i++) $i=toupper(substr($i,1,1)) tolower(substr($i,2));}1' | sed -e 's/ //g')

# Convert module name to kebab-case
moduleKebabCase=$(echo "$moduleName" | tr '[:upper:]' '[:lower:]' | sed 's/ /-/g')

# Create directories if they don't exist
moduleDir=""
scssDir=""
jsDir=""

if [ "$moduleType" == "module" ]; then
    moduleDir="../App/Fields/Layouts/"
    templateDir="../components/modules/"
    scssDir="../$scssPath"
    jsDir="../$jsPath"
else
    moduleDir="../App/Fields/Layouts/Partials/"
    templateDir="../components/partials/"
    scssDir="../$scssPath"
    jsDir="../$jsPath"
fi

mkdir -p "$moduleDir"
mkdir -p "$scssDir"
mkdir -p "$jsDir"

# Determine the source template file based on moduleType
templateFile="template.php"

# Determine the destination ACF Fields PHP file name
acfFieldsFile="$moduleDir$modulePascalCase.php"
touch "$acfFieldsFile"

# Copy the Fields.php template content to the ACF Fields file
cat "Fields.php" > "$acfFieldsFile"

# Determine the destination ACF Template PHP file name
acfTemplateFile="$templateDir$moduleKebabCase.php"
touch "$acfTemplateFile"

# Copy the template.php template content to the ACF Template file
cat "template.php" > "$acfTemplateFile"

# Replace placeholders in the ACF Fields file using awk
awk -v namespace="$namespace" -v kebabCase="$moduleKebabCase" -v pascalCase="$modulePascalCase" -v moduleName="$moduleName" '{
    gsub("NAME_SPACE_ID_LOWERCASE", tolower(namespace));
    gsub("NAME_SPACE_ID", namespace);
    gsub("KEBAB_CASE_MODULE_NAME", kebabCase);
    gsub("PASCAL_CASE_MODULE_NAME", pascalCase);
    gsub("MODULE_NAME", moduleName);
    print
}' "$acfFieldsFile" > tmpfile && mv tmpfile "$acfFieldsFile"

# Replace placeholders in the ACF Template file using awk
awk -v namespace="$namespace" -v kebabCase="$moduleKebabCase" -v pascalCase="$modulePascalCase" -v moduleName="$moduleName" '{
    gsub("NAME_SPACE_ID_LOWERCASE", tolower(namespace));
    gsub("NAME_SPACE_ID", namespace);
    gsub("KEBAB_CASE_MODULE_NAME", kebabCase);
    gsub("PASCAL_CASE_MODULE_NAME", pascalCase);
    gsub("MODULE_NAME", moduleName);
    print
}' "$acfTemplateFile" > tmpfile && mv tmpfile "$acfTemplateFile"

# Generate SCSS file if needed
if [ "$generateScss" == "true" ]; then
    scssFile="../$scssPath$moduleKebabCase.scss"
    touch "$scssFile"

    # Read the content from module.scss template and replace placeholders
    awk -v namespace="$namespace" -v kebabCase="$moduleKebabCase" -v pascalCase="$modulePascalCase" -v moduleName="$moduleName" '{
        gsub("NAME_SPACE_ID_LOWERCASE", tolower(namespace));
        gsub("NAME_SPACE_ID", namespace);
        gsub("KEBAB_CASE_MODULE_NAME", kebabCase);
        gsub("PASCAL_CASE_MODULE_NAME", pascalCase);
        gsub("MODULE_NAME", moduleName);
        print
    }' "module.scss" > "$scssFile"
fi

# Generate JavaScript file if needed
if [ "$generateJs" == "true" ]; then
    jsFile="../$jsPath$moduleKebabCase.js"
    touch "$jsFile"
fi

echo "Module created successfully!"