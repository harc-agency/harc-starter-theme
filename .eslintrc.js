module.exports = {
    // root: true,
    env: {
        browser: true,
        es2021: true
    },
    globals: {
        module: "readonly",
        require: "readonly",
        __dirname: "readonly"
    },

    parser: "vue-eslint-parser",
    extends: [
        "eslint:recommended",
        "plugin:vue/vue3-essential"
    ],

    overrides: [
        {
            env: {
                node: true
            },
            files: [
                ".eslintrc.{js,cjs}"
            ],
            parserOptions: {
                sourceType: "script"
            }
        }
    ],
    parserOptions: {
        ecmaVersion: "latest",
        sourceType: "module"
    },
    plugins: [
        "vue"
    ],
    rules: {
        indent: ["warn", 4], "linebreak-style": ["error", "unix"],
        quotes: ["error", "double", { avoidEscape: true, allowTemplateLiterals: true }],
        semi: ["error", "never"],
        "no-unused-vars": [1, { args: "none" }],
        "no-multiple-empty-lines": [1, { max: 1, maxEOF: 1 }],
        "no-multi-spaces": ["error", { ignoreEOLComments: true }],
        "no-trailing-spaces": ["error", {
            skipBlankLines: false,
            ignoreComments: true

        }],
        "array-bracket-spacing": [
            1, "never",
            { singleValue: false, objectsInArrays: false, arraysInArrays: false }
        ],
        // "brace-style": ["error", "allman", { allowSingleLine: true }],
        "brace-style": ["error", "1tbs", { allowSingleLine: true }],
        "arrow-parens": ["error", "as-needed"],
        "object-curly-spacing": ["error", "always"],
        "implicit-arrow-linebreak": ["error", "beside"],
        "comma-dangle": ["error", "never"],
        "arrow-body-style": [
            "error",
            "as-needed",
            { requireReturnForObjectLiteral: true }
        ],
        "max-len": "off",
        "import/prefer-default-export": "off",

        "prefer-destructuring": "off", // is when 
        "no-debugger": "warn",
        "no-console": ["warn", { allow: ["warn", "error"] }],
        "default-case": 0, // switch case default is not mandatory
        "promise/always-return": 0,
        "quote-props": ["error", "as-needed"],
        "no-await-in-loop": 0,
        "accessor-pairs": "error",
        "vue/require-prop-types": "off",
        "vue/html-closing-bracket-spacing": "off",
        "vue/multi-word-component-names": "off",
        "vue/no-lone-template": "off",
        "vue/html-quotes": ["error", "double", { avoidEscape: true }],
        "vue/html-indent": ["error", 2, {
            attribute: 1,
            baseIndent: 0,
            closeBracket: 0,
            alignAttributesVertically: true,
            ignores: []

        }],
        "vue/html-closing-bracket-newline": [
            "error",
            {
                singleline: "never",
                multiline: "never"
            }
        ],
        "vue/multiline-html-element-content-newline": ["error", {
            ignoreWhenEmpty: true,
            ignores: ["pre", "textarea"],
            allowEmptyLines: false
        }],
        "vue/no-spaces-around-equal-signs-in-attribute": ["error"],
        "vue/no-multi-spaces": ["error", {
            ignoreProperties: false
        }]
    }
}